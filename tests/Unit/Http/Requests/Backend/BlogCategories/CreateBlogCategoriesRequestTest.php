<?php

namespace Tests\Unit\Http\Requests\Backend\BlogCategories;

use Tests\TestCase;

/**
 * @see \App\Http\Requests\Backend\BlogCategories\CreateBlogCategoriesRequest
 */
class CreateBlogCategoriesRequestTest extends TestCase
{
    /** @var \App\Http\Requests\Backend\BlogCategories\CreateBlogCategoriesRequest */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new \App\Http\Requests\Backend\BlogCategories\CreateBlogCategoriesRequest();
    }

    /**
     * @test
     */
    public function authorize()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $actual = $this->subject->authorize();

        $this->assertTrue($actual);
    }

    /**
     * @test
     */
    public function rules()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $actual = $this->subject->rules();

        $this->assertEquals([], $actual);
    }

    // test cases...
}