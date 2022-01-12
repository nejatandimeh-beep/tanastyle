@extends('Layouts.IndexCustomer')
@section('Content')
    <script>
        const hashFunc =(input)=>{
            return '*'+input+'*';
        }

        class Block{
            constructor(data,hash, lastHash) {
                this.data=data;
                this.hash=hash;
                this.lastHash=lastHash;
            }
        }

        class BlockChain{
            constructor() {
                const genesis=new Block('gen-data', 'gen-hash','gen-lastHash');
                this.chain=[genesis];
            }

            addBlock(data){
                const lastHash=this.chain[this.chain.length-1].hash;
                const hash=hashFunc(data+lastHash);
                const b=new Block(data, hash,lastHash);
                this.chain.push(b);
            }
        }

        const fooBlack=new Block('foo-data','foo-hash','foo-lastHash');

        const fooBlackChain=new BlockChain();

        fooBlackChain.addBlock('one');
        fooBlackChain.addBlock('two');
        fooBlackChain.addBlock('three');
        console.log(fooBlackChain);
    </script>
@endsection
