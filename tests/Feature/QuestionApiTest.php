<?php

namespace Tests\Feature;

use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_questions(): void
    {
        Question::create([
            'level' => 1,
            'translations' => [
                'uz_lat' => [
                    'question' => "Aholi punktlarida yengil avtomobillarning harakatlanish tezligi soatiga necha kilometrdan oshmasligi kerak?",
                    'options' => [
                        ['id' => 'a', 'text' => "60 km/s dan oshmasligi kerak"],
                        ['id' => 'b', 'text' => "70 km/s dan oshmasligi kerak"],
                        ['id' => 'c', 'text' => "50 km/s dan oshmasligi kerak"]
                    ]
                ],
                'uz_cyr' => [
                    'question' => "Аҳоли пунктларида енгил автомобилларнинг ҳаракатланиш тезлиги соатига неча километрдан ошмаслиги керак?",
                    'options' => [
                        ['id' => 'a', 'text' => "60 км/с дан ошмаслиги керак"],
                        ['id' => 'b', 'text' => "70 км/с дан ошмаслиги ерак"],
                        ['id' => 'c', 'text' => "50 км/с дан ошмаслиги керак"]
                    ]
                ],
                'ru' => [
                    'question' => "С какой максимальной скоростью разрешается движение легковых автомобилей в населенных пунктах?",
                    'options' => [
                        ['id' => 'a', 'text' => "Не более 60 км/ч"],
                        ['id' => 'b', 'text' => "Не более 70 км/ч"],
                        ['id' => 'c', 'text' => "Не более 50 км/ч"]
                    ]
                ],
                'qr' => [
                    'question' => "Aholı punktlerinde jeńil avtomobillerdiń háreketleniw tezligi saatına neshe kilometrden aspawı kerek?",
                    'options' => [
                        ['id' => 'a', 'text' => "60 km/s dan aspawı kerek"],
                        ['id' => 'b', 'text' => "70 km/s dan aspawı kerek"],
                        ['id' => 'c', 'text' => "50 km/s dan aspawı kerek"]
                    ]
                ]
            ],
            'correct_option_id' => 'a'
        ]);

        $response = $this->getJson('/api/v1/questions?level=1');

        $response->assertStatus(200)
            ->assertJsonCount(20, 'data')
            ->assertJsonPath('data.0.correct_option_id', 'a');
    }

    public function test_can_create_question(): void
    {
        $response = $this->postJson('/api/v1/questions', [
            'translations' => [
                'uz_lat' => [
                    'question' => "Svetoforning miltillovchi yashil ishorasi nimani bildiradi?",
                    'options' => [
                        ['id' => 'a', 'text' => "Harakatlanishga ruxsat beradi va tez orada taqiqlovchi ishora yonishidan ogohlantiradi"],
                        ['id' => 'b', 'text' => "Harakatlanishni taqiqlaydi"],
                        ['id' => 'c', 'text' => "Tezlikni oshirishni talab qiladi"]
                    ]
                ],
                'uz_cyr' => [
                    'question' => "Светофорнинг милтилловчи яшил ишораси нимани билдиради?",
                    'options' => [
                        ['id' => 'a', 'text' => "Ҳаракатланишга рухсат беради ва тез орада тақиқловчи ишора ёнишидан огоҳлантиради"],
                        ['id' => 'b', 'text' => "Ҳаракатланишни тақиқлайди"],
                        ['id' => 'c', 'text' => "Тезликни оширишни талаб қилади"]
                    ]
                ],
                'ru' => [
                    'question' => "Что означает мигающий зеленый сигнал светофора?",
                    'options' => [
                        ['id' => 'a', 'text' => "Разрешает движение и информирует, что время его действия истекает и вскоре будет включен запрещающий сигнал"],
                        ['id' => 'b', 'text' => "Запрещает движение"],
                        ['id' => 'c', 'text' => "Требует увеличения скорости"]
                    ]
                ],
                'qr' => [
                    'question' => "Svetofordıń jıpılaqlı jasıl belgisi neni bildiredi?",
                    'options' => [
                        ['id' => 'a', 'text' => "Harekettiń qosılıwına ruxsat beredi hám tez arada qadaqulawshı belginiń janıwınan eskertedi"],
                        ['id' => 'b', 'text' => "Hareketti qadaqulaydı"],
                        ['id' => 'c', 'text' => "Tezlikti asırıwdı talap etedi"]
                    ]
                ]
            ],
            'correct_option_id' => 'a'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('questions', [
            'correct_option_id' => 'a'
        ]);
    }
}
