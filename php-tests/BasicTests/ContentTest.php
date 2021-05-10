<?php

use kalanis\kw_forums\Content;


class ContentTest extends CommonTestClass
{
    public function testPosts()
    {
        $data = new Content\PostList();
        $data->setData(23, 2345648613, 17, 'abcdefghijkl',  'mnopqrstuvwx');
        $this->assertEquals(23, $data->getId());
        $this->assertEquals(2345648613, $data->getTime());
        $this->assertEquals(17, $data->getCounter());
        $this->assertEquals('abcdefghijkl', $data->getName());
        $this->assertEquals('mnopqrstuvwx', $data->getText());
    }

    public function testFiles()
    {
        $data = new Content\TopicList();
        $data->setData(23, 2345648613, 'abcdefghijkl',  'mnopqrstuvwx',  851, true);
        $this->assertEquals(23, $data->getId());
        $this->assertEquals(2345648613, $data->getTime());
        $this->assertEquals('abcdefghijkl', $data->getName());
        $this->assertEquals('mnopqrstuvwx', $data->getDesc());
        $this->assertEquals(851, $data->getCounter());
        $this->assertTrue($data->isHeader());
    }
}
