<?php

class BasicTest extends \Codeception\Test\Unit
{
    public function testBasicAssertion()
    {
        #convertCurrency();
        #expect_that(false);
        $this->assertEquals(true, true, "nie zgadza się bombka");
    }
}
