<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_contact_form_submission()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('contacts.create'));
        $response->assertStatus(200);

        $contactData = [
            'name' => 'John Doe',
            'contact' => '998877665',
            'email' => 'johndoe@example.com',
        ];

        $response = $this->post(route('contacts.store'), $contactData);

        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'contact' => '998877665',
            'email' => 'johndoe@example.com',
        ]);

        $response->assertRedirect(route('contacts.index'));

        $response->assertSessionHas('success', 'Contato cadastrado com sucesso!');
    }

    public function test_create_contact_form_with_validation_errors()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $invalidData = [
            'name' => 'Jo',
            'contact' => '123',
            'email' => 'invalidemail'
        ];

        $response = $this->post(route('contacts.store'), $invalidData);

        $response->assertSessionHasErrors(['name', 'contact', 'email']);
    }

    public function test_update_contact_form_submission()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $contact = Contact::create([
            'name' => 'Jane Doe',
            'contact' => '987654321',
            'email' => 'janedoe@example.com',
        ]);

        $updatedData = [
            'name' => 'Jane Smith',
            'contact' => '998877665',
            'email' => 'janesmith@example.com',
        ];

        $response = $this->put(route('contacts.update', $contact->id), $updatedData);

        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'name' => 'Jane Smith',
            'contact' => '998877665',
            'email' => 'janesmith@example.com',
        ]);

        $response->assertRedirect(route('contacts.index'));
    }

    public function test_delete_contact()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        $contact = Contact::create([
            'name' => 'John Doe',
            'contact' => '998877665',
            'email' => 'johndoe@example.com',
        ]);
    
        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'name' => 'John Doe',
            'contact' => '998877665',
            'email' => 'johndoe@example.com',
        ]);
    
        $response = $this->delete(route('contacts.destroy', $contact->id));
    
        $this->assertSoftDeleted('contacts', [
            'id' => $contact->id,
        ]);
    
        $response->assertRedirect(route('contacts.index'));
    }
}
