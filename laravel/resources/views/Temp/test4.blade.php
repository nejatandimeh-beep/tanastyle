<?php

namespace App\Http\Controllers\SellerMajor;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kavenegar;


class Basic extends Controller
{
    protected $sellerMajorID, $sellerMajorData;

    public function __construct()
    {
        $this->middleware('IsSellerMajor');
        $this->middleware(function ($request, $next) {
            session_start();
            $this->sellerMajorID = Auth::guard('sellerMajor')->user()->id;
            $this->sellerMajorData = DB::table('sellersmajor')
                ->where('id',$this->sellerMajorID)
                ->first();

            return $next($request);
        });

    }

    public function panel()
    {
        $data = $this->sellerMajorData;

        $events = DB::table('seller_major_event as e')
            ->select('*', 'e.ID as eventID', 'e.Time as eventTime')
            ->leftJoin('seller_major_event_like as el', 'el.EventID', 'e.ID')
            ->where('e.SellerMajorID', $this->sellerMajorID)
            ->where("e.Time", ">", Carbon::now()->subHours(24)->toDateTimeString())
            ->groupBy('e.ID')
            ->orderBy('e.ID', 'ASC')
            ->get();

        $message = DB::table('seller_major_msg')
            ->select('*')
            ->where('SellerMajorID', $this->sellerMajorID)
            ->where('Status', '0')
            ->orderBy('ID', 'ASC')
            ->get();

        $_SESSION['loadPost']=6;
        $_SESSION['currentPost']=6;
        $postsCount = DB::table('seller_major_post')
            ->select('SellerMajorID')
            ->where('SellerMajorID',$this->sellerMajorID)
            ->get()
            ->count();

        $posts = DB::table('seller_major_post as p')
            ->select('*', 'p.ID as postID', 'p.Time as postTime','pc.ID as commentID')
            ->leftJoin('seller_major_post_like as pl', 'pl.PostID', 'p.ID')
            ->leftJoin('seller_major_post_comment as pc', 'pc.PostID', 'p.ID')
            ->leftJoin('seller_major_post_comment_reply as pcr', 'pcr.CommentID', 'pc.ID')
            ->where('p.SellerMajorID', $this->sellerMajorID)
            ->groupBy('p.ID')
            ->orderBy('p.ID', 'DESC')
            ->take($_SESSION['loadPost'])
            ->get();

        $eventDate = array();
        $eventTime = array();
        $eventHowDay = array();
        foreach ($events as $key => $rec) {
            $temp = explode(' ', $rec->eventTime);
            $eventDate[$key] = $this->convertDateToPersian($temp[0]);
            $eventDate[$key] = $this->addZero($eventDate[$key]);
            $eventTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

            if ($eventTime[$key] < 11520) {
                $eventHowDay[$key] = $this->howDays($eventTime[$key]);
            } else {
                $eventHowDay[$key] = $eventDate[$key];
            }
        }

        $postDate = array();
        $postTime = array();
        $postHowDay = array();
        $postCommentDate = array();
        $postCommentTime = array();
        $postCommentHowDay = array();
        $commentCount=array();
        foreach ($posts as $key => $rec) {
            $temp = explode(' ', $rec->postTime);
            $postDate[$key] = $this->convertDateToPersian($temp[0]);
            $postDate[$key] = $this->addZero($postDate[$key]);
            $postTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

            if ($postTime[$key] < 11520) {
                $postHowDay[$key] = $this->howDays($postTime[$key]);
            } else {
                $postHowDay[$key] = $postDate[$key];
            }

            if(!is_null($rec->CommentTime)){
                $temp = explode(' ', $rec->CommentTime);
                $postCommentDate[$key] = $this->convertDateToPersian($temp[0]);
                $postCommentDate[$key] = $this->addZero($postCommentDate[$key]);
                $postCommentTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

                if ($postCommentTime[$key] < 11520) {
                    $postCommentHowDay[$key] = $this->howDays($postCommentTime[$key]);
                } else {
                    $postCommentHowDay[$key] = $postCommentDate[$key];
                }
            } else {
                $postCommentHowDay[$key]='';
            }

            $comments=DB::table('seller_major_post_comment')
                ->select('PostID')
                ->where('PostID',$rec->postID)
                ->get();
            $commentCount[$key]=count($comments);
        }
        return view('SellerMajor.Panel', compact('data', 'events', 'posts', 'postsCount',
            'eventHowDay', 'message', 'postHowDay', 'postCommentHowDay','commentCount'));
    }

    public function bioUpdate($bioText)
    {
        DB::table('sellersmajor')
            ->where('id', $this->sellerMajorID)
            ->update([
                'Bio' => $bioText,
            ]);

        return 'updated';
    }

    public function addressUpdate($address)
    {
        DB::table('sellersmajor')
            ->where('id', $this->sellerMajorID)
            ->update([
                'Address' => $address,
            ]);

        return $address;
    }

    public function instagramUpdate($instagramLink)
    {
        $instagramLink = str_replace('88888888888888888888888', '/', $instagramLink);

        DB::table('sellersmajor')
            ->where('id', $this->sellerMajorID)
            ->update([
                'Instagram' => $instagramLink,
            ]);

        return $instagramLink;
    }

    public function updateProfileImage(Request $request)
    {
        $mobile = Auth::guard('sellerMajor')->user()->Mobile;
        $image = $request->get('imageUrl');
        $path = public_path('img/sellerMajorProfileImage/') . $mobile;
        File::makeDirectory($path, 0777, true, true);
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $imageFullPath = $path . '/profileImg.jpg';
        file_put_contents($imageFullPath, $image_base64);

        DB::table('sellersmajor')
            ->where('id', $this->sellerMajorID)
            ->update([
                'Pic' => 'img/sellerMajorProfileImage/' . $mobile,
            ]);

        return 'Success';
    }

    public function addEvent(Request $request)
    {
        $text = $request->get('eventText');
        DB::table('seller_major_event')
            ->insert([
                'SellerMajorID' => $this->sellerMajorID,
                'Text' => $text,
                'Pic' => 'img/SellerMajor/Events/' . $this->sellerMajorID,
            ]);

        $eventId = DB::table('seller_major_event')
            ->select('ID')
            ->latest('ID')
            ->first();

        $image = $request->get('eventImageUrl');
        $path = public_path('img/SellerMajor/Events/') . $this->sellerMajorID;
        File::makeDirectory($path, 0777, true, true);
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $imageFullPath = $path . '/' . $eventId->ID . '.jpg';
        file_put_contents($imageFullPath, $image_base64);

        return 'Success';
    }

    public function removeEvent($item)
    {
        $data = DB::table('seller_major_event')
            ->select('ID', 'Pic')
            ->where('ID', $item)
            ->first();

        File::delete(public_path($data->Pic . '/' . $item . '.jpg'));

        DB::table('seller_major_event_visit')
            ->where('EventID', $item)
            ->delete();

        DB::table('seller_major_event')
            ->where('ID', $item)
            ->delete();

        return redirect()->route('sellerMajorPanel');
    }

    public function removeProfileImage()
    {
        $data = $this->sellerMajorData;

        File::deleteDirectory(public_path($data->Pic));

        DB::table('sellersmajor')
            ->where('id', $this->sellerMajorID)
            ->update([
                'Pic' => '',
            ]);

        return redirect()->route('sellerMajorPanel');
    }

    public function addPost(Request $request)
    {
        $text = $request->get('postText');
        $tag = '#';
        DB::table('seller_major_Post')
            ->insert([
                'SellerMajorID' => $this->sellerMajorID,
                'Tag' => $tag,
                'Text' => $text,
                'Pic' => 'img/SellerMajor/Posts/' . $this->sellerMajorID,
            ]);

        $postId = DB::table('seller_major_post')
            ->select('ID')
            ->latest('ID')
            ->first();

        $image = $request->get('postImageUrl');
        $path = public_path('img/SellerMajor/Posts/') . $this->sellerMajorID;
        File::makeDirectory($path, 0777, true, true);
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $imageFullPath = $path . '/' . $postId->ID . '.jpg';
        file_put_contents($imageFullPath, $image_base64);

        $source = imagecreatefromstring($image_base64);
        list($width, $height) = getimagesize($image);
        $newWidth = 300;
        $newHeight = 375;
        $thumb = imagecreatetruecolor($newWidth, $newHeight);
        $white = imagecolorallocate($thumb, 255, 255, 255);
        imagefill($thumb, 0, 0, $white);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $imageFullPath = $path . '/' . $postId->ID . '-sample.jpg';
        imagejpeg($thumb, $imageFullPath, 80);

        imagedestroy($thumb);
        imagedestroy($source);

        return redirect()->route('sellerMajorPanel');
    }

    public function messages()
    {
        $msg = DB::table('seller_major_msg as m')
            ->select('m.*', 'md.ID', 'md.Time', 'md.MessageID','sm.Pic','sm.name')
            ->leftJoin('seller_major_msg_detail as md', 'md.MessageID', 'm.ID')
            ->leftJoin('sellersmajor as sm', 'sm.id', 'm.SellerMajorID')
            ->where('m.SellerMajorID', $this->sellerMajorID)
            ->orderBy('md.ID', 'DESC')
            ->get()
            ->unique('m.SellerMajorID');

        $eventDate = array();
        $eventTime = array();
        $eventHowDay = array();
        foreach ($msg as $key => $rec) {
            $temp = explode(' ', $rec->Time);
            $eventDate[$key] = $this->convertDateToPersian($temp[0]);
            $eventDate[$key] = $this->addZero($eventDate[$key]);
            $eventTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

            if ($eventTime[$key] < 11520) {
                $eventHowDay[$key] = $this->howDays($eventTime[$key]);
            } else {
                $eventHowDay[$key] = $eventDate[$key];
            }
        }
        return view('SellerMajor.Messages', compact('msg', 'eventHowDay'));
    }

    public function messagesDetail()
    {
        $msg = DB::table('seller_major_msg as m')
            ->select('m.*', 'md.*', 's.id as sellerMajorID', 's.Pic as sellerPic', 's.name as sellerName')
            ->leftJoin('seller_major_msg_detail as md', 'md.MessageID', 'm.ID')
            ->leftJoin('sellersmajor as s', 's.id', 'm.SellerMajorID')
            ->where('m.SellerMajorID', $this->sellerMajorID)
            ->orderBy('md.ID')
            ->get();

        $eventDate = array();
        $eventTime = array();
        $msgHowDay = array();
        foreach ($msg as $key => $rec) {
            $temp = explode(' ', $rec->Time);
            $eventDate[$key] = $this->convertDateToPersian($temp[0]);
            $eventDate[$key] = $this->addZero($eventDate[$key]);
            $eventTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

            if ($eventTime[$key] < 11520) {
                $msgHowDay[$key] = $this->howDays($eventTime[$key]);
            } else {
                $msgHowDay[$key] = $eventDate[$key];
            }
        }

        return view('SellerMajor.MessagesDetail', compact('msg', 'msgHowDay'));
    }

    public function messagesAnswer(Request $request)
    {
        $msgID = $request->get('msgID');
        $msgDetailID = $request->get('msgDetailID');
        $answer = $request->get('answer');
        $attachmentImg = $request->file('attachmentImg');
        if (!is_null($attachmentImg)) {
            $source = '';
            $picPath = public_path('/img/SellerMajor/Attachment/') . $this->sellerMajorID;
            File::makeDirectory($picPath, 0777, true, true);
            switch ($attachmentImg->getMimeType()) {
                case 'image/jpeg':
                case 'image/jpg':
                    $source = imagecreatefromjpeg($attachmentImg);
                    break;
                case 'image/png':
                    $source = imagecreatefrompng($attachmentImg);
                    break;
                case 'image/gif':
                    $source = imagecreatefromgif($attachmentImg);
                    break;
            }
            $attachFullPath = $picPath . '/' . $msgDetailID . '.jpg';
            imagejpeg($source, $attachFullPath);

            list($width, $height) = getimagesize($attachmentImg);
            $newWidth = (25 * $width) / 100;
            $newHeight = (25 * $height) / 100;
            $thumb = imagecreatetruecolor($newWidth, $newHeight);
            $white = imagecolorallocate($thumb, 255, 255, 255);
            imagefill($thumb, 0, 0, $white);
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            $imageFullPath = $picPath . '/' . $msgDetailID . '-sample.jpg';
            imagejpeg($thumb, $imageFullPath, 80);
            imagedestroy($thumb);
            imagedestroy($source);
            $attachFullPath = '/img/SellerMajor/Attachment/' . $this->sellerMajorID . '/' . $msgDetailID;
        } else {
            $attachFullPath = '';
        }

        DB::table('seller_major_msg_detail')->insert([
            [
                'MessageID' => $msgID,
                'Reply' => !is_null($answer)?$answer:'',
                'AttachPath' => $attachFullPath,
            ],
        ]);

        DB::table('seller_major_msg')
            ->where('SellerMajorID', $this->sellerMajorID)
            ->update([
                'Status' => '1',
            ]);

        return redirect()->route('sellerMajorMessagesDetail');
    }

    public function postComment($id)
    {
        return $id;
    }

    public function loadPost()
    {
        $posts = DB::table('seller_major_post as p')
            ->select('*', 'p.ID as postID', 'p.Time as postTime','pc.ID as commentID')
            ->leftJoin('seller_major_post_like as pl', 'pl.PostID', 'p.ID')
            ->leftJoin('seller_major_post_comment as pc', 'pc.PostID', 'p.ID')
            ->leftJoin('seller_major_post_comment_reply as pcr', 'pcr.CommentID', 'pc.ID')
            ->where('p.SellerMajorID', $this->sellerMajorID)
            ->groupBy('p.ID')
            ->orderBy('p.ID', 'DESC')
            ->skip($_SESSION['loadPost'])
            ->take(3)
            ->get();

        $_SESSION['loadPost']=$_SESSION['loadPost']+3;
        $postDate = array();
        $postTime = array();
        $postHowDay = array();
        $postCommentDate = array();
        $postCommentTime = array();
        $postCommentHowDay = array();
        $commentCount=array();
        $postLink='';
        $postDetail='';
        foreach ($posts as $key => $rec) {
            $temp = explode(' ', $rec->postTime);
            $postDate[$key] = $this->convertDateToPersian($temp[0]);
            $postDate[$key] = $this->addZero($postDate[$key]);
            $postTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

            if ($postTime[$key] < 11520) {
                $postHowDay[$key] = $this->howDays($postTime[$key]);
            } else {
                $postHowDay[$key] = $postDate[$key];
            }

            if(!is_null($rec->CommentTime)){
                $temp = explode(' ', $rec->CommentTime);
                $postCommentDate[$key] = $this->convertDateToPersian($temp[0]);
                $postCommentDate[$key] = $this->addZero($postCommentDate[$key]);
                $postCommentTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

                if ($postCommentTime[$key] < 11520) {
                    $postCommentHowDay[$key] = $this->howDays($postCommentTime[$key]);
                } else {
                    $postCommentHowDay[$key] = $postCommentDate[$key];
                }
            } else {
                $postCommentHowDay[$key]='';
            }

            $comments=DB::table('seller_major_post_comment')
                ->select('PostID')
                ->where('PostID',$rec->postID)
                ->get();
            $commentCount[$key]=count($comments);

            $postLink=$postLink.'<div class="col-lg-2 col-4 g-brd-around g-brd-white p-0">
                        <a class="d-block u-block-hover u-bg-overlay g-bg-black-opacity-0_3--after g-bg-transparent--hover--after"
                           href="#"
                           id="samplePost-'.$_SESSION['currentPost'].'"
                           onclick="samplePostClick($(this).attr(\'id\').replace(/[^0-9]/gi, \'\'))"
                           data-toggle="modal"
                           data-target="#postRail">
                            <img class="img-fluid u-block-hover__main--zoom-v1"
                                 src="'.asset($rec->Pic.'/'.$rec->postID.'-sample.jpg').'"
                                 alt="Image Description">
                        </a>
                    </div> ';

            $commentCountCondition=$commentCount[$key] !== 0 ? '':'d-none';
            $commentVisit=$commentCount[$key] !== 0 ? $commentCount[$key]:'';
            $accordionBtnClick="$('#accordionBtn-".$key."').trigger('click')";
            $postLike=$rec->LikeCount===0?'':$rec->LikeCount.' پسند';
            $commentLike=$rec->CommentLike.' پسند';
            $comment='';
            if(!is_null($rec->commentID)){
                $comment= '<div class="text-right g-mb-10">
                                <div>
                                    <div>
                                    <span
                                        class="g-font-size-12 g-font-weight-600 g-color-gray-dark-v2">کاربر شماره 20</span>
                                        <img
                                            class="g-width-20 g-height-20 rounded-circle"
                                            src="'.asset($this->sellerMajorData->Pic.'/profileImg.jpg').'"
                                            alt="Image Description">
                                    </div>
                                </div>
                                <div style="direction: rtl" class="d-flex">
                                    <div class="p-0 col-10 g-mt-5">
                                        <div class="g-pr-10">
                                            <p style="min-width: 150px; border-radius: 6px 0 6px 6px"
                                               class="g-font-size-13 g-color-gray-dark-v1 g-pa-5 g-pb-0 m-0">
                                                     '.$rec->CommentText.'
                                            </p>
                                            <p class="m-0">
                                                <small
                                                    class="g-font-weight-600 g-mx-5 g-color-gray-dark-v4">'.$postCommentHowDay[$key].'</small>
                                                <small
                                                    class="g-font-weight-600 g-mx-5 g-color-gray-dark-v4">'.$commentLike.'</small>
                                                <a class="g-color-gray-dark-v2"
                                                   href="#!">
                                                    <small
                                                        class="g-font-weight-600 g-mx-5 g-color-gray-dark-v4">پاسخ</small>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 p-0 g-pt-10 text-center">
                                        <a class="g-color-gray-dark-v2"
                                           href="#!"
                                           onclick="sendComment('.$rec->PostID.')">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>';
            }

            $postDetail=$postDetail.'<div class="col-12 col-lg-3 mx-auto p-0" id="detailPost-'.$_SESSION['currentPost'].'">
                                            <div style="direction: rtl" class="g-pa-5 text-right">
                                                <div class="col-12 p-0 text-right">
                                                    <img class="g-width-30 g-height-30 rounded-circle g-brd-around g-brd-2 g-brd-gray-light-v4"
                                                         src="'.asset($this->sellerMajorData->Pic.'/profileImg.jpg').'"
                                                         alt="Image Description">
                                                    <span
                                                        class="g-font-size-13 g-font-weight-600">'.$this->sellerMajorData->name.'</span>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <img class="w-100" src="'.asset($rec->Pic.'/'.$rec->postID.'-sample.jpg').'"
                                                     alt="Image Description">
                                            </div>
                                            <div class="g-pa-10 g-pb-0">
                                                <div class="text-left d-flex justify-content-between">
                                                    <div>
                                                        <a class="g-color-gray-dark-v1" href="#!">
                                                            <i class="fa fa-bookmark-o g-font-size-20 g-line-height-0_7"></i>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a class="g-color-gray-dark-v1 g-ml-10" href="#!">
                                                            <i class="icon-paper-plane u-line-icon-pro g-font-size-17 g-font-weight-600 g-line-height-0_7"></i>
                                                        </a>
                                                        <a class="g-color-gray-dark-v1 g-ml-10"
                                                           href="#accordion-04-body-'.$key.'" data-toggle="collapse"
                                                           id="accordionBtn-'.$key.'"
                                                           data-parent="#accordion-04" aria-expanded="true"
                                                           aria-controls="accordion-04-body-'.$key.'"
                                                           onclick="closeAllComment('.$key.')">
                                                            <i class="icon-bubble u-line-icon-pro g-font-size-17 g-font-weight-600 g-line-height-0_7"></i>
                                                        </a>
                                                        <a class="g-color-gray-dark-v1 g-ml-10" href="#!">
                                                            <i class="icon-heart u-line-icon-pro g-font-size-17  g-font-weight-600 g-line-height-0_7"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h6 style="direction: rtl" class="p-0 m-0 text-right">
                                                    <small>'.$postLike.'</small>
                                                </h6>
                                            </div>
                                            <div class="g-px-10">
                                                <pre style="direction: rtl;"
                                                     class="p-0 g-mt-10 text-right g-mb-0 col-10 ml-auto g-font-size-13"
                                                     id="text"
                                                     maxlength="300"><span
                                                        class="g-font-weight-600">'.$this->sellerMajorData->name.' '.'</span>'.$rec->Text.'</pre>
                                                <div class="'.$commentCountCondition.'">
                                                    <a class="g-color-gray-dark-v2 w-100"
                                                       href="#!">
                                                        <div style="cursor: pointer"
                                                            class="g-font-weight-600 g-mx-5 g-font-size-12 g-color-gray-dark-v4 d-flex col-12 g-px-5 justify-content-end"
                                                            onclick="'.$accordionBtnClick.'">
                                                            <span class="g-mr-5">نظر</span>
                                                            <span>'.$commentVisit.'</span>
                                                            <span class="g-ml-5">دیدن</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div style="direction: rtl" class="text-right">
                                                    <small
                                                        class="g-color-gray-dark-v1 text-center">'.$postHowDay[$key].'</small>
                                                </div>
                                                <div id="accordion-04" class="u-accordion" role="tablist"
                                                     aria-multiselectable="false">
                                                    <!-- Card -->
                                                    <div class="card rounded-0 g-mb-5 g-brd-none">
                                                        <div id="accordion-04-body-'.$key.'"
                                                             class="collapse g-pa-10 g-pr-0 g-pb-0"
                                                             role="tabpanel"
                                                             aria-labelledby="accordion-04-heading-'.$key.'"
                                                             data-parent="#accordion-04">
                                                            <div style="max-height: 300px; height: auto !important;"
                                                                 class="u-accordion__body g-color-gray-dark-v5 customScrollBar p-0 g-pr-10">
                                                                '.$comment.'
                                                                <div style="position: relative" class="g-mt-2">
                                                                    <div class="d-flex">
                                                                        <textarea style="direction: rtl"
                                                                            class="form-control growingToTop col-10 ml-auto hideScrollBar g-brd-none form-control-md g-resize-none rounded-0 p-0 text-right g-font-size-16"
                                                                            tabindex="1"
                                                                            value=""
                                                                            oninput="if($(this).val()===\'\') $(\'#sendCommentBtn\').addClass(\'d-none\'); else $(\'#sendCommentBtn\').removeClass(\'d-none\');"
                                                                            placeholder="نظر شما.."
                                                                            name="comment-'.$key.'"
                                                                            id="comment-'.$key.'"
                                                                            maxlength="300"></textarea>
                                                                        <div class="g-pl-5">
                                                                            <img
                                                                                class="g-width-20 g-height-20 rounded-circle"
                                                                                src="'.asset($this->sellerMajorData->Pic.'/profileImg.jpg').'"
                                                                                alt="Image Description">
                                                                        </div>
                                                                    </div>
                                                                    <div id="sendCommentBtn"
                                                                         style="position: absolute; left:0; bottom: -5px;"
                                                                         class="d-none">
                                                                        <a class="g-color-gray-dark-v3" href="#!"
                                                                           onclick="sendComment('.$rec->PostID.')">
                                                                            <i class="fa fa-arrow-left g-pa-10"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Card -->
                                                </div>
                                            </div>
                                        </div> ';
            $_SESSION['currentPost']++;
        }
        $postLink=$postLink.' </div>';
        $postDetail=$postDetail.' </div>';
        return array($postLink,$postDetail,$_SESSION['loadPost']);
    }
    //------------------------------------------------
    //  Convert Date to Iranian Calender
    public function convertDateToPersian($d)
    {
        if ($d === 0)
            return 0;
        else
            $da = new DateTime($d);

        $day = $da->format('d');
        $mon = $da->format('m');
        $year = $da->format('Y');

        // Convert Date to Iranian
        return Verta::getJalali($year, $mon, $day);
    }

//  Minutes Passed of Spacial Time
    public function dateLenToNow($date, $time)
    {
        $orderDateTime = $date . ' ' . $time;
        $today = new DateTime('Asia/Tehran');
        $result = $today->format('Y-m-d H:i:s');
        $datetime1 = strtotime($orderDateTime);
        $datetime2 = strtotime($result);
        $interval = abs($datetime2 - $datetime1);
        $minutes = round($interval / 60);

        return (int)$minutes;
    }

//    how past Days of Current Days
    public function howDays($day)
    {
        switch (true) {
            case  ($day < 3):
                return 'لحضاتی پیش';
                break;
            case  (($day >= 3) && ($day < 59)):
                return $day . ' دقیقه';
                break;
            case  (($day >= 60) && ($day <= 90)):
                return '1 ساعت';
                break;
            case  (($day > 90) && ($day <= 150)):
                return '2 ساعت';
                break;
            case  (($day > 150) && ($day <= 210)):
                return '3 ساعت';
                break;
            case  (($day > 210) && ($day <= 270)):
                return '4 ساعت';
                break;
            case  (($day > 270) && ($day <= 330)):
                return '5 ساعت';
                break;
            case  (($day > 330) && ($day <= 390)):
                return '6 ساعت';
                break;
            case  (($day > 390) && ($day <= 450)):
                return '7 ساعت';
                break;
            case  (($day > 450) && ($day <= 510)):
                return '8 ساعت';
                break;
            case  (($day > 510) && ($day <= 570)):
                return '9 ساعت';
                break;
            case  (($day > 570) && ($day <= 630)):
                return '10 ساعت';
                break;
            case  (($day > 630) && ($day <= 690)):
                return '11 ساعت';
                break;
            case  (($day > 690) && ($day <= 750)):
                return '12 ساعت';
                break;
            case  (($day > 750) && ($day <= 810)):
                return '13 ساعت';
                break;
            case  (($day > 810) && ($day <= 870)):
                return '14 ساعت';
                break;
            case  (($day > 870) && ($day <= 930)):
                return '15 ساعت';
                break;
            case  (($day > 930) && ($day <= 990)):
                return '16 ساعت';
                break;
            case  (($day > 990) && ($day <= 1050)):
                return '17 ساعت';
                break;
            case  (($day > 1050) && ($day <= 1110)):
                return '18 ساعت';
                break;
            case  (($day > 1110) && ($day <= 1170)):
                return '19 ساعت';
                break;
            case  (($day > 1170) && ($day <= 1230)):
                return '20 ساعت';
                break;
            case  (($day > 1230) && ($day <= 1290)):
                return '21 ساعت';
                break;
            case  (($day > 1290) && ($day <= 1350)):
                return '22 ساعت';
                break;
            case  (($day > 1350) && ($day <= 1410)):
                return '23 ساعت';
                break;
            case  (($day > 1410) && ($day <= 1440)):
                return '24 ساعت';
                break;
            case  (($day > 1440) && ($day < 2880)):
                return '1 روز';
                break;
            case  (($day > 2880) && ($day < 4320)):
                return '2 روز';
                break;
            case  (($day > 4320) && ($day < 5760)):
                return '3 روز';
                break;
            case  (($day > 5760) && ($day < 7200)):
                return '4 روز';
                break;
            case  (($day > 7200) && ($day < 8640)):
                return '5 روز';
                break;
            case  (($day > 8640) && ($day < 10080)):
                return '6 روز';
                break;
            case  (($day > 10080) && ($day < 11520)):
                return 'هفته قبل';
                break;
            default :
                break;
        }
    }

    // Add Zero Number to Day and Month of Converted Dates
    public function addZero($d)
    {
        for ($i = 0; $i < 3; $i++)
            if (strlen($d[$i]) < 2)
                $d[$i] = '0' . $d[$i];
        return $d[0] . '.' . $d[1] . '.' . $d[2];
    }
}



//-----------------------------------edited--------------------------------------
<?php

namespace App\Http\Controllers\SellerMajor;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kavenegar;


class Basic extends Controller
{
    protected $sellerMajorID, $sellerMajorData;

    public function __construct()
    {
        $this->middleware('IsSellerMajor');
        $this->middleware(function ($request, $next) {
            session_start();
            $this->sellerMajorID = Auth::guard('sellerMajor')->user()->id;
            $this->sellerMajorData = DB::table('sellersmajor')
                ->where('id',$this->sellerMajorID)
                ->first();

            return $next($request);
        });

    }

    public function panel()
    {
        $data = $this->sellerMajorData;

        $events = DB::table('seller_major_event as e')
            ->select('*', 'e.ID as eventID', 'e.Time as eventTime')
            ->leftJoin('seller_major_event_like as el', 'el.EventID', 'e.ID')
            ->where('e.SellerMajorID', $this->sellerMajorID)
            ->where("e.Time", ">", Carbon::now()->subHours(24)->toDateTimeString())
            ->groupBy('e.ID')
            ->orderBy('e.ID', 'ASC')
            ->get();

        $message = DB::table('seller_major_msg')
            ->select('*')
            ->where('SellerMajorID', $this->sellerMajorID)
            ->where('Status', '0')
            ->orderBy('ID', 'ASC')
            ->get();

        $_SESSION['loadPost']=6;
        $_SESSION['currentPost']=6;
        $postsCount = DB::table('seller_major_post')
            ->select('SellerMajorID')
            ->where('SellerMajorID',$this->sellerMajorID)
            ->get()
            ->count();

        $posts = DB::table('seller_major_post as p')
            ->select('*', 'p.ID as postID', 'p.Time as postTime','pc.ID as commentID')
            ->leftJoin('seller_major_post_like as pl', 'pl.PostID', 'p.ID')
            ->leftJoin('seller_major_post_comment as pc', 'pc.PostID', 'p.ID')
            ->leftJoin('seller_major_post_comment_reply as pcr', 'pcr.CommentID', 'pc.ID')
            ->where('p.SellerMajorID', $this->sellerMajorID)
            ->groupBy('p.ID')
            ->orderBy('p.ID', 'DESC')
            ->take($_SESSION['loadPost'])
            ->get();

        $eventDate = array();
        $eventTime = array();
        $eventHowDay = array();
        foreach ($events as $key => $rec) {
            $temp = explode(' ', $rec->eventTime);
            $eventDate[$key] = $this->convertDateToPersian($temp[0]);
            $eventDate[$key] = $this->addZero($eventDate[$key]);
            $eventTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

            if ($eventTime[$key] < 11520) {
                $eventHowDay[$key] = $this->howDays($eventTime[$key]);
            } else {
                $eventHowDay[$key] = $eventDate[$key];
            }
        }

        $postDate = array();
        $postTime = array();
        $postHowDay = array();
        $postCommentDate = array();
        $postCommentTime = array();
        $postCommentHowDay = array();
        $commentCount=array();
        foreach ($posts as $key => $rec) {
            $temp = explode(' ', $rec->postTime);
            $postDate[$key] = $this->convertDateToPersian($temp[0]);
            $postDate[$key] = $this->addZero($postDate[$key]);
            $postTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

            if ($postTime[$key] < 11520) {
                $postHowDay[$key] = $this->howDays($postTime[$key]);
            } else {
                $postHowDay[$key] = $postDate[$key];
            }

            if(!is_null($rec->CommentTime)){
                $temp = explode(' ', $rec->CommentTime);
                $postCommentDate[$key] = $this->convertDateToPersian($temp[0]);
                $postCommentDate[$key] = $this->addZero($postCommentDate[$key]);
                $postCommentTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

                if ($postCommentTime[$key] < 11520) {
                    $postCommentHowDay[$key] = $this->howDays($postCommentTime[$key]);
                } else {
                    $postCommentHowDay[$key] = $postCommentDate[$key];
                }
            } else {
                $postCommentHowDay[$key]='';
            }

            $comments=DB::table('seller_major_post_comment')
                ->select('PostID')
                ->where('PostID',$rec->postID)
                ->get();
            $commentCount[$key]=count($comments);
        }
        return view('SellerMajor.Panel', compact('data', 'events', 'posts', 'postsCount',
            'eventHowDay', 'message', 'postHowDay', 'postCommentHowDay','commentCount'));
    }

    public function bioUpdate($bioText)
    {
        DB::table('sellersmajor')
            ->where('id', $this->sellerMajorID)
            ->update([
                'Bio' => $bioText,
            ]);

        return 'updated';
    }

    public function addressUpdate($address)
    {
        DB::table('sellersmajor')
            ->where('id', $this->sellerMajorID)
            ->update([
                'Address' => $address,
            ]);

        return $address;
    }

    public function instagramUpdate($instagramLink)
    {
        $instagramLink = str_replace('88888888888888888888888', '/', $instagramLink);

        DB::table('sellersmajor')
            ->where('id', $this->sellerMajorID)
            ->update([
                'Instagram' => $instagramLink,
            ]);

        return $instagramLink;
    }

    public function updateProfileImage(Request $request)
    {
        $mobile = Auth::guard('sellerMajor')->user()->Mobile;
        $image = $request->get('imageUrl');
        $path = public_path('img/sellerMajorProfileImage/') . $mobile;
        File::makeDirectory($path, 0777, true, true);
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $imageFullPath = $path . '/profileImg.jpg';
        file_put_contents($imageFullPath, $image_base64);

        DB::table('sellersmajor')
            ->where('id', $this->sellerMajorID)
            ->update([
                'Pic' => 'img/sellerMajorProfileImage/' . $mobile,
            ]);

        return 'Success';
    }

    public function addEvent(Request $request)
    {
        $text = $request->get('eventText');
        DB::table('seller_major_event')
            ->insert([
                'SellerMajorID' => $this->sellerMajorID,
                'Text' => $text,
                'Pic' => 'img/SellerMajor/Events/' . $this->sellerMajorID,
            ]);

        $eventId = DB::table('seller_major_event')
            ->select('ID')
            ->latest('ID')
            ->first();

        $image = $request->get('eventImageUrl');
        $path = public_path('img/SellerMajor/Events/') . $this->sellerMajorID;
        File::makeDirectory($path, 0777, true, true);
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $imageFullPath = $path . '/' . $eventId->ID . '.jpg';
        file_put_contents($imageFullPath, $image_base64);

        return 'Success';
    }

    public function removeEvent($item)
    {
        $data = DB::table('seller_major_event')
            ->select('ID', 'Pic')
            ->where('ID', $item)
            ->first();

        File::delete(public_path($data->Pic . '/' . $item . '.jpg'));

        DB::table('seller_major_event_visit')
            ->where('EventID', $item)
            ->delete();

        DB::table('seller_major_event')
            ->where('ID', $item)
            ->delete();

        return redirect()->route('sellerMajorPanel');
    }

    public function removeProfileImage()
    {
        $data = $this->sellerMajorData;

        File::deleteDirectory(public_path($data->Pic));

        DB::table('sellersmajor')
            ->where('id', $this->sellerMajorID)
            ->update([
                'Pic' => '',
            ]);

        return redirect()->route('sellerMajorPanel');
    }

    public function addPost(Request $request)
    {
        $text = $request->get('postText');
        $tag = '#';
        DB::table('seller_major_Post')
            ->insert([
                'SellerMajorID' => $this->sellerMajorID,
                'Tag' => $tag,
                'Text' => $text,
                'Pic' => 'img/SellerMajor/Posts/' . $this->sellerMajorID,
            ]);

        $postId = DB::table('seller_major_post')
            ->select('ID')
            ->latest('ID')
            ->first();

        $image = $request->get('postImageUrl');
        $path = public_path('img/SellerMajor/Posts/') . $this->sellerMajorID;
        File::makeDirectory($path, 0777, true, true);
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $imageFullPath = $path . '/' . $postId->ID . '.jpg';
        file_put_contents($imageFullPath, $image_base64);

        $source = imagecreatefromstring($image_base64);
        list($width, $height) = getimagesize($image);
        $newWidth = 300;
        $newHeight = 375;
        $thumb = imagecreatetruecolor($newWidth, $newHeight);
        $white = imagecolorallocate($thumb, 255, 255, 255);
        imagefill($thumb, 0, 0, $white);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $imageFullPath = $path . '/' . $postId->ID . '-sample.jpg';
        imagejpeg($thumb, $imageFullPath, 80);

        imagedestroy($thumb);
        imagedestroy($source);

        return redirect()->route('sellerMajorPanel');
    }

    public function messages()
    {
        $msg = DB::table('seller_major_msg as m')
            ->select('m.*', 'md.ID', 'md.Time', 'md.MessageID','sm.Pic','sm.name')
            ->leftJoin('seller_major_msg_detail as md', 'md.MessageID', 'm.ID')
            ->leftJoin('sellersmajor as sm', 'sm.id', 'm.SellerMajorID')
            ->where('m.SellerMajorID', $this->sellerMajorID)
            ->orderBy('md.ID', 'DESC')
            ->get()
            ->unique('m.SellerMajorID');

        $eventDate = array();
        $eventTime = array();
        $eventHowDay = array();
        foreach ($msg as $key => $rec) {
            $temp = explode(' ', $rec->Time);
            $eventDate[$key] = $this->convertDateToPersian($temp[0]);
            $eventDate[$key] = $this->addZero($eventDate[$key]);
            $eventTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

            if ($eventTime[$key] < 11520) {
                $eventHowDay[$key] = $this->howDays($eventTime[$key]);
            } else {
                $eventHowDay[$key] = $eventDate[$key];
            }
        }
        return view('SellerMajor.Messages', compact('msg', 'eventHowDay'));
    }

    public function messagesDetail()
    {
        $msg = DB::table('seller_major_msg as m')
            ->select('m.*', 'md.*', 's.id as sellerMajorID', 's.Pic as sellerPic', 's.name as sellerName')
            ->leftJoin('seller_major_msg_detail as md', 'md.MessageID', 'm.ID')
            ->leftJoin('sellersmajor as s', 's.id', 'm.SellerMajorID')
            ->where('m.SellerMajorID', $this->sellerMajorID)
            ->orderBy('md.ID')
            ->get();

        $eventDate = array();
        $eventTime = array();
        $msgHowDay = array();
        foreach ($msg as $key => $rec) {
            $temp = explode(' ', $rec->Time);
            $eventDate[$key] = $this->convertDateToPersian($temp[0]);
            $eventDate[$key] = $this->addZero($eventDate[$key]);
            $eventTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

            if ($eventTime[$key] < 11520) {
                $msgHowDay[$key] = $this->howDays($eventTime[$key]);
            } else {
                $msgHowDay[$key] = $eventDate[$key];
            }
        }

        return view('SellerMajor.MessagesDetail', compact('msg', 'msgHowDay'));
    }

    public function messagesAnswer(Request $request)
    {
        $msgID = $request->get('msgID');
        $msgDetailID = $request->get('msgDetailID');
        $answer = $request->get('answer');
        $attachmentImg = $request->file('attachmentImg');
        if (!is_null($attachmentImg)) {
            $source = '';
            $picPath = public_path('/img/SellerMajor/Attachment/') . $this->sellerMajorID;
            File::makeDirectory($picPath, 0777, true, true);
            switch ($attachmentImg->getMimeType()) {
                case 'image/jpeg':
                case 'image/jpg':
                    $source = imagecreatefromjpeg($attachmentImg);
                    break;
                case 'image/png':
                    $source = imagecreatefrompng($attachmentImg);
                    break;
                case 'image/gif':
                    $source = imagecreatefromgif($attachmentImg);
                    break;
            }
            $attachFullPath = $picPath . '/' . $msgDetailID . '.jpg';
            imagejpeg($source, $attachFullPath);

            list($width, $height) = getimagesize($attachmentImg);
            $newWidth = (25 * $width) / 100;
            $newHeight = (25 * $height) / 100;
            $thumb = imagecreatetruecolor($newWidth, $newHeight);
            $white = imagecolorallocate($thumb, 255, 255, 255);
            imagefill($thumb, 0, 0, $white);
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            $imageFullPath = $picPath . '/' . $msgDetailID . '-sample.jpg';
            imagejpeg($thumb, $imageFullPath, 80);
            imagedestroy($thumb);
            imagedestroy($source);
            $attachFullPath = '/img/SellerMajor/Attachment/' . $this->sellerMajorID . '/' . $msgDetailID;
        } else {
            $attachFullPath = '';
        }

        DB::table('seller_major_msg_detail')->insert([
            [
                'MessageID' => $msgID,
                'Reply' => !is_null($answer)?$answer:'',
                'AttachPath' => $attachFullPath,
            ],
        ]);

        DB::table('seller_major_msg')
            ->where('SellerMajorID', $this->sellerMajorID)
            ->update([
                'Status' => '1',
            ]);

        return redirect()->route('sellerMajorMessagesDetail');
    }

    public function postComment($id)
    {
        return $id;
    }

    public function loadPost()
    {
        $posts = DB::table('seller_major_post as p')
            ->select('*', 'p.ID as postID', 'p.Time as postTime','pc.*', 's.name as commentSellerMajorID')
            ->leftJoin('seller_major_post_like as pl', 'pl.PostID', 'p.ID')
            ->leftJoin('seller_major_post_comment as pc', 'pc.PostID', 'p.ID')
            ->leftJoin('seller_major_post_comment_reply as pcr', 'pcr.CommentID', 'pc.ID')
            ->leftJoin('sellersmajor as s', 's.id', 'pc.SellerMajorID')
            ->where('p.SellerMajorID', $this->sellerMajorID)
            ->groupBy('p.ID')
            ->orderBy('p.ID', 'DESC')
            ->skip($_SESSION['loadPost'])
            ->take(3)
            ->get();

        $_SESSION['loadPost']=$_SESSION['loadPost']+3;
        $postDate = array();
        $postTime = array();
        $postHowDay = array();
        $postCommentDate = array();
        $postCommentTime = array();
        $postCommentHowDay = array();
        $commentCount=array();
        $postLink='';
        $postDetail='';
        foreach ($posts as $key => $rec) {
            $temp = explode(' ', $rec->postTime);
            $postDate[$key] = $this->convertDateToPersian($temp[0]);
            $postDate[$key] = $this->addZero($postDate[$key]);
            $postTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

            if ($postTime[$key] < 11520) {
                $postHowDay[$key] = $this->howDays($postTime[$key]);
            } else {
                $postHowDay[$key] = $postDate[$key];
            }

            if(!is_null($rec->CommentTime)){
                $temp = explode(' ', $rec->CommentTime);
                $postCommentDate[$key] = $this->convertDateToPersian($temp[0]);
                $postCommentDate[$key] = $this->addZero($postCommentDate[$key]);
                $postCommentTime[$key] = $this->dateLenToNow($temp[0], $temp[1]);

                if ($postCommentTime[$key] < 11520) {
                    $postCommentHowDay[$key] = $this->howDays($postCommentTime[$key]);
                } else {
                    $postCommentHowDay[$key] = $postCommentDate[$key];
                }
            } else {
                $postCommentHowDay[$key]='';
            }

            $comments=DB::table('seller_major_post_comment')
                ->select('PostID')
                ->where('PostID',$rec->postID)
                ->get();
            $commentCount[$key]=count($comments);

            $postLink=$postLink.'<div class="col-lg-2 col-4 g-brd-around g-brd-white p-0">
                        <a class="d-block u-block-hover u-bg-overlay g-bg-black-opacity-0_3--after g-bg-transparent--hover--after"
                           href="#"
                           id="samplePost-'.$_SESSION['currentPost'].'"
                           onclick="samplePostClick($(this).attr(\'id\').replace(/[^0-9]/gi, \'\'))"
                           data-toggle="modal"
                           data-target="#postRail">
                            <img class="img-fluid u-block-hover__main--zoom-v1"
                                 src="'.asset($rec->Pic.'/'.$rec->postID.'-sample.jpg').'"
                                 alt="Image Description">
                        </a>
                    </div> ';

            $commentCountCondition=$commentCount[$key] !== 0 ? '':'d-none';
            $commentVisit=$commentCount[$key] !== 0 ? $commentCount[$key]:'';
            $accordionBtnClick="$('#accordionBtn-".$key."').trigger('click')";
            $postLike=$rec->LikeCount===0?'':$rec->LikeCount.' پسند';
            $commentLike=$rec->CommentLike.' پسند';
            $comment='';
            if(!is_null($rec->commentID)){
                $comment= '<div class="text-right g-mb-10">
                                <div>
                                    <div>
                                    <span
                                        class="g-font-size-12 g-font-weight-600 g-color-gray-dark-v2">'.$rec->commentSellerMajorID.'</span>
                                        <img
                                            class="g-width-20 g-height-20 rounded-circle"
                                            src="'.asset($this->sellerMajorData->Pic.'/profileImg.jpg').'"
                                            alt="Image Description">
                                    </div>
                                </div>
                                <div style="direction: rtl" class="d-flex">
                                    <div class="p-0 col-10 g-mt-5">
                                        <div class="g-pr-10">
                                            <p style="min-width: 150px; border-radius: 6px 0 6px 6px"
                                               class="g-font-size-13 g-color-gray-dark-v1 g-pa-5 g-pb-0 m-0">
                                                     '.$rec->CommentText.'
                                            </p>
                                            <p class="m-0">
                                                <small
                                                    class="g-font-weight-600 g-mx-5 g-color-gray-dark-v4">'.$postCommentHowDay[$key].'</small>
                                                <small
                                                    class="g-font-weight-600 g-mx-5 g-color-gray-dark-v4">'.$commentLike.'</small>
                                                <a class="g-color-gray-dark-v2"
                                                   href="#!">
                                                    <small
                                                        class="g-font-weight-600 g-mx-5 g-color-gray-dark-v4">پاسخ</small>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 p-0 g-pt-10 text-center">
                                        <a class="g-color-gray-dark-v2"
                                           href="#!"
                                           onclick="sendComment('.$rec->PostID.')">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>';
            }

            $postDetail=$postDetail.'<div class="col-12 col-lg-3 mx-auto p-0" id="detailPost-'.$_SESSION['currentPost'].'">
                                            <div style="direction: rtl" class="g-pa-5 text-right">
                                                <div class="col-12 p-0 text-right">
                                                    <img class="g-width-30 g-height-30 rounded-circle g-brd-around g-brd-2 g-brd-gray-light-v4"
                                                         src="'.asset($this->sellerMajorData->Pic.'/profileImg.jpg').'"
                                                         alt="Image Description">
                                                    <span
                                                        class="g-font-size-13 g-font-weight-600">'.$this->sellerMajorData->name.'</span>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <img class="w-100" src="'.asset($rec->Pic.'/'.$rec->postID.'-sample.jpg').'"
                                                     alt="Image Description">
                                            </div>
                                            <div class="g-pa-10 g-pb-0">
                                                <div class="text-left d-flex justify-content-between">
                                                    <div>
                                                        <a class="g-color-gray-dark-v1" href="#!">
                                                            <i class="fa fa-bookmark-o g-font-size-20 g-line-height-0_7"></i>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a class="g-color-gray-dark-v1 g-ml-10" href="#!">
                                                            <i class="icon-paper-plane u-line-icon-pro g-font-size-17 g-font-weight-600 g-line-height-0_7"></i>
                                                        </a>
                                                        <a class="g-color-gray-dark-v1 g-ml-10"
                                                           href="#accordion-04-body-'.$key.'" data-toggle="collapse"
                                                           id="accordionBtn-'.$key.'"
                                                           data-parent="#accordion-04" aria-expanded="true"
                                                           aria-controls="accordion-04-body-'.$key.'"
                                                           onclick="closeAllComment('.$key.')">
                                                            <i class="icon-bubble u-line-icon-pro g-font-size-17 g-font-weight-600 g-line-height-0_7"></i>
                                                        </a>
                                                        <a class="g-color-gray-dark-v1 g-ml-10" href="#!">
                                                            <i class="icon-heart u-line-icon-pro g-font-size-17  g-font-weight-600 g-line-height-0_7"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h6 style="direction: rtl" class="p-0 m-0 text-right">
                                                    <small>'.$postLike.'</small>
                                                </h6>
                                            </div>
                                            <div class="g-px-10">
                                                <pre style="direction: rtl;"
                                                     class="p-0 g-mt-10 text-right g-mb-0 col-10 ml-auto g-font-size-13"
                                                     id="text"
                                                     maxlength="300"><span
                                                        class="g-font-weight-600">'.$this->sellerMajorData->name.' '.'</span>'.$rec->Text.'</pre>
                                                <div class="'.$commentCountCondition.'">
                                                    <a class="g-color-gray-dark-v2 w-100"
                                                       href="#!">
                                                        <div style="cursor: pointer"
                                                            class="g-font-weight-600 g-mx-5 g-font-size-12 g-color-gray-dark-v4 d-flex col-12 g-px-5 justify-content-end"
                                                            onclick="'.$accordionBtnClick.'">
                                                            <span class="g-mr-5">نظر</span>
                                                            <span>'.$commentVisit.'</span>
                                                            <span class="g-ml-5">دیدن</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div style="direction: rtl" class="text-right">
                                                    <small
                                                        class="g-color-gray-dark-v1 text-center">'.$postHowDay[$key].'</small>
                                                </div>
                                                <div id="accordion-04" class="u-accordion" role="tablist"
                                                     aria-multiselectable="false">
                                                    <!-- Card -->
                                                    <div class="card rounded-0 g-mb-5 g-brd-none">
                                                        <div id="accordion-04-body-'.$key.'"
                                                             class="collapse g-pa-10 g-pr-0 g-pb-0"
                                                             role="tabpanel"
                                                             aria-labelledby="accordion-04-heading-'.$key.'"
                                                             data-parent="#accordion-04">
                                                            <div style="max-height: 300px; height: auto !important;"
                                                                 class="u-accordion__body g-color-gray-dark-v5 customScrollBar p-0 g-pr-10">
                                                                '.$comment.'
                                                                <div style="position: relative" class="g-mt-2">
                                                                    <div class="d-flex">
                                                                        <textarea style="direction: rtl"
                                                                            class="form-control growingToTop col-10 ml-auto hideScrollBar g-brd-none form-control-md g-resize-none rounded-0 p-0 text-right g-font-size-16"
                                                                            tabindex="1"
                                                                            value=""
                                                                            oninput="if($(this).val()===\'\') $(\'#sendCommentBtn\').addClass(\'d-none\'); else $(\'#sendCommentBtn\').removeClass(\'d-none\');"
                                                                            placeholder="نظر شما.."
                                                                            name="comment-'.$key.'"
                                                                            id="comment-'.$key.'"
                                                                            maxlength="300"></textarea>
                                                                        <div class="g-pl-5">
                                                                            <img
                                                                                class="g-width-20 g-height-20 rounded-circle"
                                                                                src="'.asset($this->sellerMajorData->Pic.'/profileImg.jpg').'"
                                                                                alt="Image Description">
                                                                        </div>
                                                                    </div>
                                                                    <div id="sendCommentBtn"
                                                                         style="position: absolute; left:0; bottom: -5px;"
                                                                         class="d-none">
                                                                        <a class="g-color-gray-dark-v3" href="#!"
                                                                           onclick="sendComment('.$rec->PostID.')">
                                                                            <i class="fa fa-arrow-left g-pa-10"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Card -->
                                                </div>
                                            </div>
                                        </div> ';
            $_SESSION['currentPost']++;
        }
        $postLink=$postLink.' </div>';
        $postDetail=$postDetail.' </div>';
        return array($postLink,$postDetail,$_SESSION['loadPost']);
    }
    //------------------------------------------------
    //  Convert Date to Iranian Calender
    public function convertDateToPersian($d)
    {
        if ($d === 0)
            return 0;
        else
            $da = new DateTime($d);

        $day = $da->format('d');
        $mon = $da->format('m');
        $year = $da->format('Y');

        // Convert Date to Iranian
        return Verta::getJalali($year, $mon, $day);
    }

//  Minutes Passed of Spacial Time
    public function dateLenToNow($date, $time)
    {
        $orderDateTime = $date . ' ' . $time;
        $today = new DateTime('Asia/Tehran');
        $result = $today->format('Y-m-d H:i:s');
        $datetime1 = strtotime($orderDateTime);
        $datetime2 = strtotime($result);
        $interval = abs($datetime2 - $datetime1);
        $minutes = round($interval / 60);

        return (int)$minutes;
    }

//    how past Days of Current Days
    public function howDays($day)
    {
        switch (true) {
            case  ($day < 3):
                return 'لحضاتی پیش';
                break;
            case  (($day >= 3) && ($day < 59)):
                return $day . ' دقیقه';
                break;
            case  (($day >= 60) && ($day <= 90)):
                return '1 ساعت';
                break;
            case  (($day > 90) && ($day <= 150)):
                return '2 ساعت';
                break;
            case  (($day > 150) && ($day <= 210)):
                return '3 ساعت';
                break;
            case  (($day > 210) && ($day <= 270)):
                return '4 ساعت';
                break;
            case  (($day > 270) && ($day <= 330)):
                return '5 ساعت';
                break;
            case  (($day > 330) && ($day <= 390)):
                return '6 ساعت';
                break;
            case  (($day > 390) && ($day <= 450)):
                return '7 ساعت';
                break;
            case  (($day > 450) && ($day <= 510)):
                return '8 ساعت';
                break;
            case  (($day > 510) && ($day <= 570)):
                return '9 ساعت';
                break;
            case  (($day > 570) && ($day <= 630)):
                return '10 ساعت';
                break;
            case  (($day > 630) && ($day <= 690)):
                return '11 ساعت';
                break;
            case  (($day > 690) && ($day <= 750)):
                return '12 ساعت';
                break;
            case  (($day > 750) && ($day <= 810)):
                return '13 ساعت';
                break;
            case  (($day > 810) && ($day <= 870)):
                return '14 ساعت';
                break;
            case  (($day > 870) && ($day <= 930)):
                return '15 ساعت';
                break;
            case  (($day > 930) && ($day <= 990)):
                return '16 ساعت';
                break;
            case  (($day > 990) && ($day <= 1050)):
                return '17 ساعت';
                break;
            case  (($day > 1050) && ($day <= 1110)):
                return '18 ساعت';
                break;
            case  (($day > 1110) && ($day <= 1170)):
                return '19 ساعت';
                break;
            case  (($day > 1170) && ($day <= 1230)):
                return '20 ساعت';
                break;
            case  (($day > 1230) && ($day <= 1290)):
                return '21 ساعت';
                break;
            case  (($day > 1290) && ($day <= 1350)):
                return '22 ساعت';
                break;
            case  (($day > 1350) && ($day <= 1410)):
                return '23 ساعت';
                break;
            case  (($day > 1410) && ($day <= 1440)):
                return '24 ساعت';
                break;
            case  (($day > 1440) && ($day < 2880)):
                return '1 روز';
                break;
            case  (($day > 2880) && ($day < 4320)):
                return '2 روز';
                break;
            case  (($day > 4320) && ($day < 5760)):
                return '3 روز';
                break;
            case  (($day > 5760) && ($day < 7200)):
                return '4 روز';
                break;
            case  (($day > 7200) && ($day < 8640)):
                return '5 روز';
                break;
            case  (($day > 8640) && ($day < 10080)):
                return '6 روز';
                break;
            case  (($day > 10080) && ($day < 11520)):
                return 'هفته قبل';
                break;
            default :
                break;
        }
    }

    // Add Zero Number to Day and Month of Converted Dates
    public function addZero($d)
    {
        for ($i = 0; $i < 3; $i++)
            if (strlen($d[$i]) < 2)
                $d[$i] = '0' . $d[$i];
        return $d[0] . '.' . $d[1] . '.' . $d[2];
    }
}
