<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function category_validation_passes_with_valid_data()
    {
        $response = $this->post(route('categories.store'), [
            'name' => 'Restaurantes',
            'status' => 'active',
        ]);

        $response->assertRedirect(route('categories.index'));
        $this->assertDatabaseHas('categories', [
            'name' => 'Restaurantes',
            'status' => 'active',
        ]);
    }

    /** @test */
    public function category_validation_fails_with_invalid_status()
    {
        $response = $this->post(route('categories.store'), [
            'name' => 'Restaurantes',
            'status' => 'invalid_status', // Deve falhar (só permite active/inactive)
        ]);

        $response->assertSessionHasErrors(['status']);
    }

    /** @test */
    public function business_validation_passes_with_valid_data()
    {
        $category = Category::create([
            'name' => 'Tecnologia',
            'status' => 'active',
        ]);

        $response = $this->post(route('businesses.store'), [
            'name' => 'Google Portugal',
            'address' => 'Avenida da Liberdade, Lisboa',
            'vat_number' => 'PT999999990', // IVA válido em Portugal (formato PT + 9 dígitos)
            'phone' => '+351210000000', // Telefone válido
            'email' => 'google@google.com',
            'status' => 'active',
            'category_id' => $category->id,
        ]);

        $response->assertRedirect(route('businesses.index'));
        $this->assertDatabaseHas('businesses', [
            'name' => 'Google Portugal',
            'vat_number' => 'PT999999990',
        ]);
    }

    /** @test */
    public function business_validation_fails_with_invalid_vat()
    {
        $category = Category::create([
            'name' => 'Tecnologia',
            'status' => 'active',
        ]);

        $response = $this->post(route('businesses.store'), [
            'name' => 'Google Portugal',
            'address' => 'Avenida da Liberdade, Lisboa',
            'vat_number' => 'INVALID_VAT_123', // IVA inválido no formato regex
            'phone' => '+351210000000',
            'email' => 'google@google.com',
            'status' => 'active',
            'category_id' => $category->id,
        ]);

        $response->assertSessionHasErrors(['vat_number']);
    }

    /** @test */
    public function business_validation_fails_with_invalid_phone()
    {
        $category = Category::create([
            'name' => 'Tecnologia',
            'status' => 'active',
        ]);

        $response = $this->post(route('businesses.store'), [
            'name' => 'Google Portugal',
            'address' => 'Avenida da Liberdade, Lisboa',
            'vat_number' => 'PT999999990',
            'phone' => 'abcde', // Telefone inválido (só letras)
            'email' => 'google@google.com',
            'status' => 'active',
            'category_id' => $category->id,
        ]);

        $response->assertSessionHasErrors(['phone']);
    }
}
