<?php

use kalanis\kw_forums\Cutting;


class CuttingTest extends CommonTestClass
{
    /**
     * @param int $maxLength
     * @param string $expected
     * @param string $toCut
     * @dataProvider basicCutProvider
     */
    public function testBasicEntry(int $maxLength, string $expected, string $toCut)
    {
        $data = new Cutting\Content($maxLength);
        $this->assertEquals($expected, $data->setContent($toCut)->process()->getContent());
    }

    public function basicCutProvider()
    {
        return [
            [60, 'qwert ziopa sdfgh jklyx cvbn', 'qwert ziopa sdfgh jklyx cvbn'],
            [60, 'qwertziopasdfghjklyxcvbn qwertziopasdfghjklyxcvbn  ...', 'qwertziopasdfghjklyxcvbn qwertziopasdfghjklyxcvbn qwertziopasdfghjklyxcvbn'],
            [60, '<a>qwert ziopa</a> <span>sdfgh jklyx cvbn<span> <b>qwert ziopa sdfgh jklyx cvbn </b></span></span> ...', '<a>qwert ziopa</a> <span>sdfgh jklyx cvbn<span> <b>qwert ziopa sdfgh jklyx cvbn qwert</b> ziopa<hr /> sdfgh jklyx</span></span> cvbn'],
            [60, 'qwert ziopa <span>sdfgh jklyx cvbn<span style="abc: def"> qwert ziopa sdfgh <b ></b></span></span> ...', 'qwert ziopa <span>sdfgh jklyx cvbn<span style="abc: def"> qwert ziopa sdfgh <b class="ddd hdgdd">jklyx cvbn qwert</b> ziopa<hr /> sdfgh jklyx</span></span> cvbn'],
            [60, 'qwert ziopa <hr />sdfgh jklyx cvbn<span style="abc: def"> qwert<b class="ddd "></b></span> ...', 'qwert ziopa <hr />sdfgh jklyx cvbn<span style="abc: def"> qwert<b class="ddd hdgdd"> ziopa sdfgh jklyx cvbn qwert</b> ziopa<hr /> sdfgh jklyx</span></hr> cvbn'],
            [60, 'qwert ziopa <hr />sdfgh jklyx cvbn<span style="abc: def"> qwert<b class=\'ddd \'></b></span> ...', 'qwert ziopa <hr />sdfgh jklyx cvbn<span style="abc: def"> qwert<b class=\'ddd hdgdd\'> ziopa sdfgh jklyx cvbn qwert</b> ziopa<hr /> sdfgh jklyx</span></hr> cvbn'],
        ];
    }
}
