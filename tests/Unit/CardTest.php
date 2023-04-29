<?php

use App\Models\Card;

uses(Tests\TestCase::class);

test('create Card', function () {
    $attributes = Card::factory()->make();
    $response = $this->postJson('/api/v1/cards', $attributes->attributestoArray());
    $response->assertStatus(201);

    $this->assertDatabaseHas('cards', $attributes->attributestoArray());
});

test('get Card', function () {
    $Card = Card::factory()->create();

    $response = $this->getJson("/api/v1/cards/{$Card['id']}");

    $goods = $Card['good_id'];

    if($goods == null)
    {
        $goods = [];
    }

    $response->assertStatus(200)
    ->assertJsonPath('data.id', $Card['id'])
    ->assertJsonPath('data.user', $Card['user'])
    ->assertJsonPath('data.goods', $goods);
});


test('put Card', function () {
    $Card = Card::factory()->create();
    $updatedCard = [
        'user' => 'new user1', 
        'check_id' => $Card['check_id'],
    ];

    $this->assertDatabaseHas('cards', $Card->attributesToArray());

    $this->putJson("/api/v1/cards/{$Card['id']}", $updatedCard)
    ->assertStatus(200);
    $this->assertDatabaseHas('cards', ["id" => $Card['id'] , ...$updatedCard]);
});

test('patch Card', function () {
    $Card = Card::factory()->create();
    $updatedCard = [
        'user' => 'new user2', 
        'check_id' => $Card['check_id'],
    ];

    $this->assertDatabaseHas('cards', $Card->attributesToArray());

    $this->patchJson("/api/v1/cards/{$Card['id']}", $updatedCard)
    ->assertStatus(200);
    $this->assertDatabaseHas('cards', ["id" => $Card['id'] , ...$updatedCard]);
});

test('delete Card', function () {
    $Card = Card::factory()->create();
    $response = $this->deleteJson("/api/v1/cards/{$Card['id']}");
    $response->assertStatus(200);
});

test('get failed Card', function () {
    $response = $this->getJson("/api/v1/cards/asdf");

    $response->assertStatus(500)
    ->assertJsonPath('data', null);
});
