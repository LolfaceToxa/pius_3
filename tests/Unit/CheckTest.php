<?php

use App\Models\Check;

uses(Tests\TestCase::class);

test('create Check', function () {
    $attributes = Check::factory()->make();
    $response = $this->postJson('/api/v1/checks', $attributes->attributestoArray());
    $response->assertStatus(201);

    $this->assertDatabaseHas('checks', $attributes->attributestoArray());
});

test('get Check', function () {
    $Check = Check::factory()->create();

    $response = $this->getJson("/api/v1/checks/{$Check['id']}");

    $response->assertStatus(200)
    ->assertJsonPath('data.id', $Check['id'])
    ->assertJsonPath('data.email', $Check['email']);
});


test('put Check', function () {
    $Check = Check::factory()->create();
    $updatedCheck = [
        'email' => $Check['email'],
    ];

    $this->assertDatabaseHas('checks', $Check->attributesToArray());

    $this->putJson("/api/v1/checks/{$Check['id']}", $updatedCheck)
    ->assertStatus(200);
    $this->assertDatabaseHas('checks', ["id" => $Check['id'] , ...$updatedCheck]);
});

test('patch Check', function () {
    $Check = Check::factory()->create();
    $updatedCheck = [
        'email' => $Check['email'],
    ];

    $this->assertDatabaseHas('checks', $Check->attributesToArray());

    $this->putJson("/api/v1/checks/{$Check['id']}", $updatedCheck)
    ->assertStatus(200);
    $this->assertDatabaseHas('checks', ["id" => $Check['id'] , ...$updatedCheck]);
});

test('delete Check', function () {
    $Check = Check::factory()->create();
    $response = $this->deleteJson("/api/v1/checks/{$Check['id']}");
    $response->assertStatus(200);
});

test('get failed Check', function () {
    $response = $this->getJson("/api/v1/checks/asdf111");

    $response->assertStatus(500)
    ->assertJsonPath('data', null);
});
