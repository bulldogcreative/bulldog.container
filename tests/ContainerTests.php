<?php

use PHPUnit\Framework\TestCase;

class ContainerTests extends TestCase
{
    private $container;
    private $bigValue;

    public function setUp()
    {
        $this->container = new Bulldog\Container\Container;
        $this->createBigValue();
    }

    public function testSet()
    {
        $id = 'id';
        $value = 'bulldog';

        $result = $this->container->set($id, $value);
        $this->assertSame($result, $value);
    }

    public function testGoodGetCall()
    {
        $value = 'test';
        $this->container->set('test', $value);
        $result = $this->container->get('test');
        $this->assertSame($result, $value);
    }

    public function testTrueHas()
    {
        $this->container->set('id', 'value');
        $result = $this->container->has('id');

        $this->assertTrue($result);
    }

    public function testFalseHas()
    {
        $result = $this->container->has('nope');

        $this->assertFalse($result);
    }

    public function testDifferentTypes()
    {
        $data = [
            "one" => 1,
            "two" => 2,
            "array" => ['hi'],
            "associative" => ['greeting' => 'hi'],
            "associative_num" => ['greeting' => 1],
            "obj" => new class {
            },
            "str" => "string",
            "big" => $this->bigValue,
        ];

        foreach ($data as $id => $value) {
            $set = $this->container->set($id, $value);
            $this->assertSame($set, $value);

            $got = $this->container->get($id);
            $this->assertSame($got, $value);

            $has = $this->container->has($id);
            $this->assertTrue($has);
        }
    }

    private function createBigValue()
    {
        $this->bigValue = "Yourself required no at thoughts delicate landlord it be. Branched dashwood do is whatever it. Farther be chapter at visited married in it pressed. By distrusts procuring be oh frankness existence believing instantly if. Doubtful on an juvenile as of servants insisted. Judge why maids led sir whose guest drift her point. Him comparison especially friendship was who sufficient attachment favourable how. Luckily but minutes ask picture man perhaps are inhabit. How her good all sang more why.

        Made last it seen went no just when of by. Occasional entreaties comparison me difficulty so themselves. At brother inquiry of offices without do my service. As particular to companions at sentiments. Weather however luckily enquire so certain do. Aware did stood was day under ask. Dearest affixed enquire on explain opinion he. Reached who the mrs joy offices pleased. Towards did colonel article any parties.

        Death there mirth way the noisy merit. Piqued shy spring nor six though mutual living ask extent. Replying of dashwood advanced ladyship smallest disposal or. Attempt offices own improve now see. Called person are around county talked her esteem. Those fully these way nay thing seems.

        Arrival entered an if drawing request. How daughters not promotion few knowledge contented. Yet winter law behind number stairs garret excuse. Minuter we natural conduct gravity if pointed oh no. Am immediate unwilling of attempted admitting disposing it. Handsome opinions on am at it ladyship.

        Months on ye at by esteem desire warmth former. Sure that that way gave any fond now. His boy middleton sir nor engrossed affection excellent. Dissimilar compliment cultivated preference eat sufficient may. Well next door soon we mr he four. Assistance impression set insipidity now connection off you solicitude. Under as seems we me stuff those style at. Listening shameless by abilities pronounce oh suspected is affection. Next it draw in draw much bred.

        Gave read use way make spot how nor. In daughter goodness an likewise oh consider at procured wandered. Songs words wrong by me hills heard timed. Happy eat may doors songs. Be ignorant so of suitable dissuade weddings together. Least whole timed we is. An smallness deficient discourse do newspaper be an eagerness continued. Mr my ready guest ye after short at.

        Maids table how learn drift but purse stand yet set. Music me house could among oh as their. Piqued our sister shy nature almost his wicket. Hand dear so we hour to. He we be hastily offence effects he service. Sympathize it projection ye insipidity celebrated my pianoforte indulgence. Point his truth put style. Elegance exercise as laughing proposal mistaken if. We up precaution an it solicitude acceptance invitation.

        New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.

        ﻿no purse as fully me or point. Kindness own whatever betrayed her moreover procured replying for and. Proposal indulged no do do sociable he throwing settling. Covered ten nor comfort offices carried. Age she way earnestly the fulfilled extremely. Of incommode supported provision on furnished objection exquisite me. Existence its certainly explained how improving household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonder spirit houses.

        Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at. Its strangers who you certainty earnestly resources suffering she. Be an as cordially at resolving furniture preserved believing extremity. Easy mr pain felt in. Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied";
    }
}
