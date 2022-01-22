<?php

namespace Tests\Feature;

use App\Models\CustomField;
use App\Models\CustomFieldData;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomFieldTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_post_can_attach_custom_field()
    {

		$this->actingAs(User::factory()->create());

		$post = Post::factory()->create();

		$customField = CustomField::factory()->create();

		$post->customField($customField);
		$post->customField($customField);

		// $customFieldData = CustomFieldData::factory(['post_id' => $post->id, 'custom_field_id' => $customField->id, 'data' => json_encode(['test' => 'test'])])->create();

        $this->assertTrue($post->customFields->contains('id', $post->id));
    }
}
