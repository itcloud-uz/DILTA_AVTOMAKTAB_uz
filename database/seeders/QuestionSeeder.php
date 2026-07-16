<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
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
                            ['id' => 'b', 'text' => "70 км/с дан ошмаслиги керак"],
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
            ],
            [
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
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Piyodalar o'tish joyida transport vositasini to'xtatishga ruxsat beriladimi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Taqiqlanadi"],
                            ['id' => 'b', 'text' => "Piyodalar bo'lmaganda ruxsat beriladi"],
                            ['id' => 'c', 'text' => "Faqat yo'lovchilarni tushirish uchun ruxsat beriladi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Пиёдалар ўтиш жойида транспорт воситасини тўхтатишга рухсат бериладими?",
                        'options' => [
                            ['id' => 'a', 'text' => "Тақиқланади"],
                            ['id' => 'b', 'text' => "Пиёдалар бўлмаганда рухсат берилади"],
                            ['id' => 'c', 'text' => "Фақат йўловчиларни тушириш учун рухсат берилади"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Разрешается ли остановка транспортных средств на пешеходном переходе?",
                        'options' => [
                            ['id' => 'a', 'text' => "Запрещается"],
                            ['id' => 'b', 'text' => "Разрешается при отсутствии пешеходов"],
                            ['id' => 'c', 'text' => "Разрешается только для высадки пассажиров"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Piyadalar ótiw jayında transport quralların toqtatıwǵa ruxsat beriledi me?",
                        'options' => [
                            ['id' => 'a', 'text' => "Qadaǵan etiledi"],
                            ['id' => 'b', 'text' => "Piyadalar bolmaǵanda ruxsat beriledi"],
                            ['id' => 'c', 'text' => "Tek jolashılardı túsiriw ushın ruxsat beriledi"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Shatakka olingan transport vositasida qaysi yoritish asboblari yoqilgan bo'lishi kerak?",
                        'options' => [
                            ['id' => 'a', 'text' => "Avariya yorug'lik signalizatsiyasi"],
                            ['id' => 'b', 'text' => "Yaqinni yorituvchi faralar"],
                            ['id' => 'c', 'text' => "Gabarit chiroqlari"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Шатакка олинган транспорт воситасида қайси ёритиш асбоблари ёқилган бўлиши керак?",
                        'options' => [
                            ['id' => 'a', 'text' => "Авария ёруғлик сигнализацияси"],
                            ['id' => 'b', 'text' => "Яқинни ёритувчи фаралар"],
                            ['id' => 'c', 'text' => "Габарит чироқлари"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Какие осветительные приборы должны быть включены на буксируемом транспортном средстве?",
                        'options' => [
                            ['id' => 'a', 'text' => "Аварийная световая сигнализация"],
                            ['id' => 'b', 'text' => "Ближний свет фар"],
                            ['id' => 'c', 'text' => "Габаритные огни"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Shatakka alınǵan transport quralında qaysı jaqıtlandırıw ásbapları jaǵılǵan bolıwı kerek?",
                        'options' => [
                            ['id' => 'a', 'text' => "Avariyalıq jaqtı signalizaciyası"],
                            ['id' => 'b', 'text' => "Jaqındı jaqıtlatıwshı faralar"],
                            ['id' => 'c', 'text' => "Gabarit shıraqları"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Agar chorraha oldida 4.3 'Aylanma harakat' belgisi va boshqa ustunlik belgilari bo'lmasa, kim yo'l berishi kerak?",
                        'options' => [
                            ['id' => 'a', 'text' => "Chorrahaga kirib kelayotgan haydovchi aylanma yo'ldagi transport vositalariga"],
                            ['id' => 'b', 'text' => "Aylanma yo'ldagi haydovchilar chorrahaga kirib kelayotgan transport vositalariga"],
                            ['id' => 'c', 'text' => "O'ng tomondan kelayotgan transport vositasiga qarab o'zaro kelishuv bo'yicha"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Агар чорраҳа олдида 4.3 'Айланма ҳаракат' белгиси ва бошқа устунлик белгилари бўлмаса, ким йўл бериши керак?",
                        'options' => [
                            ['id' => 'a', 'text' => "Чорраҳага кириб келаётган ҳайдовчи айланма йўлдаги транспорт воситаларига"],
                            ['id' => 'b', 'text' => "Айланма йўлдаги ҳайдовчилар чорраҳага кириб келаётган транспорт воситаларига"],
                            ['id' => 'c', 'text' => "Ўнг томондан келаётган транспорт воситасига қараб ўзаро келишув бўйича"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Если перед перекрестком установлен знак 4.3 'Круговое движение' и отсутствуют знаки приоритета, кто должен уступить дорогу?",
                        'options' => [
                            ['id' => 'a', 'text' => "Водитель, въезжающий на перекресток, transportным средствам, движущимся по кругу"],
                            ['id' => 'b', 'text' => "Водители, движущиеся по кругу, transportным средствам, въезжающим на перекресток"],
                            ['id' => 'c', 'text' => "По взаимной договоренности, ориентируясь на помеху справа"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Eger shede aldında 4.3 'Aylanba háreket' belgisi hám basqa ústinlik belgileri bolmasa, kim jol beriwi kerek?",
                        'options' => [
                            ['id' => 'a', 'text' => "Shedege kirip keletirǵan aydawshı aylanba joldaǵı transport qurallarına"],
                            ['id' => 'b', 'text' => "Aylanba joldaǵı aydawshılar shedege kirip keletirǵan transport qurallarına"],
                            ['id' => 'c', 'text' => "Oń tárepten keletirǵan transport quralına qarap óz-ara kelisim boyınsha"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Ko'priklarda, estakadalarda, yo'l o'tkazgichlarda va ularning ostida quvib o'tishga ruxsat etiladimi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Taqiqlanadi"],
                            ['id' => 'b', 'text' => "Faqat ko'rinish 100 metrdan ortiq bo'lsa ruxsat beriladi"],
                            ['id' => 'c', 'text' => "Ruxsat beriladi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Кўприкларда, эстакадаларда, йўл ўтказгичларда ва уларнинг остида қувиб ўтишга рухсат этиладими?",
                        'options' => [
                            ['id' => 'a', 'text' => "Тақиқланади"],
                            ['id' => 'b', 'text' => "Фақат кўриниш 100 метрдан ортиқ бўлса рухсат берилади"],
                            ['id' => 'c', 'text' => "Рухсат берилади"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Разрешается ли обгон на мостах, эстакадах, путепроводах и под ними?",
                        'options' => [
                            ['id' => 'a', 'text' => "Запрещается"],
                            ['id' => 'b', 'text' => "Разрешается только при видимости более 100 метров"],
                            ['id' => 'c', 'text' => "Разрешается"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Kópirlerde, estakadalarda, jol ótkizgishtlerde hám olardıń astında quwıp ótiwge ruxsat etiledi me?",
                        'options' => [
                            ['id' => 'a', 'text' => "Qadaǵan etiledi"],
                            ['id' => 'b', 'text' => "Tek kóriniw 100 metrden artıq bolsa ruxsat beriledi"],
                            ['id' => 'c', 'text' => "Ruxsat beriledi"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Harakatlanayotgan transport vositasida kimlar xavfsizlik kamarini taqishi shart?",
                        'options' => [
                            ['id' => 'a', 'text' => "Haydovchi va konstruksiyasida xavfsizlik kamarlari nazarda tutilgan barcha yo'lovchilar"],
                            ['id' => 'b', 'text' => "Faqat haydovchi"],
                            ['id' => 'c', 'text' => "Haydovchi va old o'rindiqdagi yo'lovchi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Ҳаракатланаётган транспорт воситасида кимлар хавфсизлик камарини тақиши шарт?",
                        'options' => [
                            ['id' => 'a', 'text' => "Ҳайдовчи ва конструкциясида хавфсизлик камарлари назарда тутилган барча йўловчилар"],
                            ['id' => 'b', 'text' => "Фақат ҳайдовчи"],
                            ['id' => 'c', 'text' => "Ҳайдовчи ва олд ўриндиқдаги йўловчи"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Кто обязан быть пристегнут ремнем безопасности в движущемся транспортном средстве?",
                        'options' => [
                            ['id' => 'a', 'text' => "Водитель и все пассажиры, конструкция транспортного средства которых предусматривает ремни безопасности"],
                            ['id' => 'b', 'text' => "Только водитель"],
                            ['id' => 'c', 'text' => "Водитель и пассажир на переднем сиденье"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Háreketlenip baratırǵan transport quralında kimler qáwipsizlik kemerin taǵıwı shart?",
                        'options' => [
                            ['id' => 'a', 'text' => "Aydawshı hám konstrukciyasında qáwipsizlik kemerleri názerde tutılǵan barlıq jolashılar"],
                            ['id' => 'b', 'text' => "Tek aydawshı"],
                            ['id' => 'c', 'text' => "Aydawshı hám alǵı orındıqtaǵı jolashı"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Harakat vaqtida haydovchining telefondan (quloqchinlarsiz va qo'llarni band qilgan holda) foydalanishi ruxsat etiladimi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Taqiqlanadi"],
                            ['id' => 'b', 'text' => "Ruxsat etiladi"],
                            ['id' => 'c', 'text' => "Faqat tezlik soatiga 30 km dan past bo'lsa ruxsat etiladi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Ҳаракат вақтида ҳайдовчининг телефондан (қулоқчинларсиз ва қўлларни банд қилган ҳолда) фойдаланиши рухсат этиладими?",
                        'options' => [
                            ['id' => 'a', 'text' => "Тақиқланади"],
                            ['id' => 'b', 'text' => "Рухсат этилади"],
                            ['id' => 'c', 'text' => "Фақат тезлик соатига 30 км дан паст бўлса рухсат этилади"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Разрешается ли водителю во время движения пользоваться телефоном (без гарнитуры, удерживая его рукой)?",
                        'options' => [
                            ['id' => 'a', 'text' => "Запрещается"],
                            ['id' => 'b', 'text' => "Разрешается"],
                            ['id' => 'c', 'text' => "Разрешается только при скорости менее 30 км/ч"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Háreket waqtında aydawshınıń telefondan (qulaqlıqsız hám qollardı bánt etken halda) paydalanıwına ruxsat etiledi me?",
                        'options' => [
                            ['id' => 'a', 'text' => "Qadaǵan etiledi"],
                            ['id' => 'b', 'text' => "Ruxsat etiledi"],
                            ['id' => 'c', 'text' => "Tek tezlik saatına 30 km den pás bolsa ruxsat etiledi"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Arterial qon ketishini to'xtatish uchun eng birinchi navbatda nima qilish kerak?",
                        'options' => [
                            ['id' => 'a', 'text' => "Arteriyani barmoq bilan suyakka bosib turish va burama bog'lam (jgut) qo'yish"],
                            ['id' => 'b', 'text' => "Yarani toza suv bilan yuvish"],
                            ['id' => 'c', 'text' => "Yaraga bintdan oddiy bog'lam qo'yish"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Артериал қон кетишини тўхтатиш учун энг биринчи навбатда нима қилиш керак?",
                        'options' => [
                            ['id' => 'a', 'text' => "Артерияни бармоқ билан суякка босиб туриш ва бурама боғлам (жгут) қўйиш"],
                            ['id' => 'b', 'text' => "Ярани тоза сув билан ювиш"],
                            ['id' => 'c', 'text' => "Ярага бинтдан оддий боғлам қўйиш"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Что необходимо сделать в первую очередь для остановки артериального кровотечения?",
                        'options' => [
                            ['id' => 'a', 'text' => "Прижать артерию пальцем к кости и наложить жгут"],
                            ['id' => 'b', 'text' => "Промыть рану чистой водой"],
                            ['id' => 'c', 'text' => "Наложить обычную повязку из бинта"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Arteriyanı qan ketiwin toqtatıw ushın eń birinshi náwbette ne qılıw kerek?",
                        'options' => [
                            ['id' => 'a', 'text' => "Arteriyanı barmaq penen süyekke basıp turıw hám jgut qoyıw"],
                            ['id' => 'b', 'text' => "Jaranı taza suw menen juwıw"],
                            ['id' => 'c', 'text' => "Jaraǵa bintten ápiwayı baylam qoyıw"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Svetoforning qizil ishorasi yonib turganda, o'ngga burilish ko'rsatkichi (yashil strelka belgisi) bo'lsa, qanday harakatlanish kerak?",
                        'options' => [
                            ['id' => 'a', 'text' => "Boshqa harakat ishtirokchilariga yo'l berib, ehtiyotkorlik bilan o'ngga burilishga ruxsat etiladi"],
                            ['id' => 'b', 'text' => "Burilish mutlaqo taqiqlanadi"],
                            ['id' => 'c', 'text' => "Faqat yo'nalishli transport vositalariga ruxsat etiladi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Светофорнинг қизил ишнораси ёниб турганда, ўнгга бурилиш кўрсаткичи (яшил стрелка белгиси) бўлса, қандай ҳаракатланиш керак?",
                        'options' => [
                            ['id' => 'a', 'text' => "Бошқа ҳаракат иштирокчиларига йўл бериб, эҳтиёткорлик билан ўнгга бурилишга рухсат этилади"],
                            ['id' => 'b', 'text' => "Бурилиш мутлақо тақиқланади"],
                            ['id' => 'c', 'text' => "Фақат йўналишли транспорт воситаларига рухсат этилади"]
                        ]
                    ],
                    'ru' => [
                        'question' => "При запрещающем (красном) сигнале светофора, при наличии указателя поворота направо (зеленая стрелка), как следует осуществлять движение?",
                        'options' => [
                            ['id' => 'a', 'text' => "Разрешается повернуть направо, уступив дорогу другим участникам движения и соблюдая меры предосторожности"],
                            ['id' => 'b', 'text' => "Поворот категорически запрещен"],
                            ['id' => 'c', 'text' => "Разрешается только маршрутным транспортным средствам"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Svetofordıń qızıl belgisi janıp turǵanda, ońǵa burılıw kórsetkishi (jasıl strelka belgisi) bolsa, qanday háreketleniwi kerek?",
                        'options' => [
                            ['id' => 'a', 'text' => "Basqa háreket qatnasıwshılarına jol berip, abaylap ońǵa burılıwǵa ruxsat etiledi"],
                            ['id' => 'b', 'text' => "Burılıw qadaǵan etiledi"],
                            ['id' => 'c', 'text' => "Tek jónelisli transport qurallarına ruxsat etiledi"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Teng ahamiyatli yo'llar kesishgan tartibga solinmagan chorrahada relssiz transport vositasi haydovchisi kimga yo'l berishi kerak?",
                        'options' => [
                            ['id' => 'a', 'text' => "O'ng tomondan yaqinlashib kelayotgan transport vositalariga"],
                            ['id' => 'b', 'text' => "Chap tomondan yaqinlashib kelayotgan transport vositalariga"],
                            ['id' => 'c', 'text' => "Faqat yuk avtomobillariga"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Тенг аҳамиятли йўллар кесишган тартибга солинмаган чорраҳада релссиз транспорт воситаси ҳайдовчиси кимга йўл бериши керак?",
                        'options' => [
                            ['id' => 'a', 'text' => "Ўнг томондан яқинлашиб келаётган транспорт воситаларига"],
                            ['id' => 'b', 'text' => "Чап томондан яқинлашиб келаётган транспорт воситаларига"],
                            ['id' => 'c', 'text' => "Фақат юк автомобилларига"]
                        ]
                    ],
                    'ru' => [
                        'question' => "На перекрестке равнозначных дорог водитель безрельсового транспортного средства обязан уступить дорогу кому?",
                        'options' => [
                            ['id' => 'a', 'text' => "Транспортным средствам, приближающимся справа"],
                            ['id' => 'b', 'text' => "Транспортным средствам, приближающимся слева"],
                            ['id' => 'c', 'text' => "Только грузовым автомобилям"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Teń áhmiyetli jollar kesilisken tártiplestirilmegen shedede relssiz transport quralı aydawshısı kimge jol beriwi kerek?",
                        'options' => [
                            ['id' => 'a', 'text' => "Oń tárepten jaqınlasıp keletirǵan transport qurallarına"],
                            ['id' => 'b', 'text' => "Shep tárepten jaqınlasıp keletirǵan transport qurallarına"],
                            ['id' => 'c', 'text' => "Tek júk avtomobillerine"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Aholi punktlarida tovushli ishoralardan qaysi hollarda foydalanishga ruxsat etiladi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Faqat yo'l-transport hodisasining oldini olish zarur bo'lgan hollarda"],
                            ['id' => 'b', 'text' => "Boshqa haydovchilarni quvib o'tish haqida ogohlantirish uchun ham"],
                            ['id' => 'c', 'text' => "Istalgan vaqtda yo'l harakati ishtirokchilarining e'tiborini tortish uchun"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Аҳоли пунктларида товушли ишоралардан қайси ҳолларда фойдаланишга рухсат этилади?",
                        'options' => [
                            ['id' => 'a', 'text' => "Фақат йўл-транспорт ҳодисасининг олдини олиш зарур бўлган ҳолларда"],
                            ['id' => 'b', 'text' => "Бошқа ҳайдовчиларни қувиб ўтиш ҳақида огоҳлантириш учун ҳам"],
                            ['id' => 'c', 'text' => "Исталган вақтда йўл ҳаракати иштирокчиларининг эътиборини тортиш учун"]
                        ]
                    ],
                    'ru' => [
                        'question' => "В каких случаях разрешается применять звуковые сигналы в населенных пунктах?",
                        'options' => [
                            ['id' => 'a', 'text' => "Только для предотвращения дорожно-транспортного происшествия"],
                            ['id' => 'b', 'text' => "Также для предупреждения других водителей об обгоне"],
                            ['id' => 'c', 'text' => "В любое время для привлечения внимания участников движения"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Aholı punktlerinde dawıslı signal beriwge qanday jaǵdaylarda ruxsat etiledi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Tek jol-transport hádiysesiniń aldın alıw kerek bolǵan jaǵdaylarda"],
                            ['id' => 'b', 'text' => "Basqa aydawshılardı quwıp ótiw haqqında eskertiw ushın da"],
                            ['id' => 'c', 'text' => "Qálegen waqıtta jol háreketi qatnasıwshılarınıń itibarın qaratıw ushın"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Quyidagi joylarning qaysi birida orqaga qayrilib olish taqiqlanadi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Piyodalar o'tish joylarida, tunnellarda va ko'priklarda"],
                            ['id' => 'b', 'text' => "Faqat bir tomonlama harakatli yo'llarda"],
                            ['id' => 'c', 'text' => "Chorrahalarning o'rtasida"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Қуйидаги жойларнинг қайси бирида орқага қайрилиб олиш тақиқланади?",
                        'options' => [
                            ['id' => 'a', 'text' => "Пиёдалар ўтиш жойларида, туннелларда ва кўприкларда"],
                            ['id' => 'b', 'text' => "Фақат бир томонлама ҳаракатли йўлларда"],
                            ['id' => 'c', 'text' => "Чорраҳаларнинг ўртасида"]
                        ]
                    ],
                    'ru' => [
                        'question' => "В каком из следующих мест запрещен разворот?",
                        'options' => [
                            ['id' => 'a', 'text' => "На пешеходных переходах, в тоннелях и на мостах"],
                            ['id' => 'b', 'text' => "Только на дорогах с односторонним движением"],
                            ['id' => 'c', 'text' => "Посередине перекрестков"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Tómendegi orınlardıń qaysı birinde keyinǵa burılıw qadaǵan etiledi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Piyadalar ótiw orınlarında, tunellerde hám kópirlerde"],
                            ['id' => 'b', 'text' => "Tek bir tárepleme háreketli jollarda"],
                            ['id' => 'c', 'text' => "Shedelerdiń ortasında"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Temir yo'l kesishmasidan kamida necha metr masofada to'xtab turish (turargoh) taqiqlanadi?",
                        'options' => [
                            ['id' => 'a', 'text' => "50 metrdan yaqinroqda"],
                            ['id' => 'b', 'text' => "100 metrdan yaqinroqda"],
                            ['id' => 'c', 'text' => "15 metrdan yaqinroqda"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Темир йўл кесишмасидан камида неча метр масофада тўхтаб туриш (тураргоҳ) тақиқланади?",
                        'options' => [
                            ['id' => 'a', 'text' => "50 метрдан яқинроқда"],
                            ['id' => 'b', 'text' => "100 метрдан яқинроқда"],
                            ['id' => 'c', 'text' => "15 метрдан яқинроқда"]
                        ]
                    ],
                    'ru' => [
                        'question' => "На каком минимальном расстоянии от железнодорожного переезда запрещена стоянка транспортных средств?",
                        'options' => [
                            ['id' => 'a', 'text' => "Ближе 50 метров"],
                            ['id' => 'b', 'text' => "Ближе 100 метров"],
                            ['id' => 'c', 'text' => "Ближе 15 метров"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Temir jol kespesinen keminde neshe metr aralıqta toqtap turıw qadaǵan etiledi?",
                        'options' => [
                            ['id' => 'a', 'text' => "50 metrden jaqınraqta"],
                            ['id' => 'b', 'text' => "100 metrden jaqınraqta"],
                            ['id' => 'c', 'text' => "15 metrden jaqınraqta"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Shlagbaum ochiq bo'lsa-da, svetoforning qizil chirog'i miltillab tursa, temir yo'l kesishmasidan o'tish mumkinmi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Taqiqlanadi"],
                            ['id' => 'b', 'text' => "Yaqinlashib kelayotgan poezd bo'lmasa ruxsat beriladi"],
                            ['id' => 'c', 'text' => "Ruxsat beriladi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Шлагбаум очиқ бўлса-да, светофорнинг қизил чироғи милтиллаб турса, темир йўл кесишмасидан ўтиш мумкинми?",
                        'options' => [
                            ['id' => 'a', 'text' => "Тақиқланади"],
                            ['id' => 'b', 'text' => "Яқинлашиб келаётган поезд бўлмаса рухсат берилади"],
                            ['id' => 'c', 'text' => "Рухсат берилади"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Разрешается ли проезд через железнодорожный переезд, если шлагбаум открыт, но мигает красный сигнал светофора?",
                        'options' => [
                            ['id' => 'a', 'text' => "Запрещается"],
                            ['id' => 'b', 'text' => "Разрешается при отсутствии приближающегося поезда"],
                            ['id' => 'c', 'text' => "Разрешается"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Shlagbaum ashıq bolsa da, svetofordıń qızıl shıraǵı jıpılaqlap tursa, temir jol kespesinen ótiwge ruxsat etiledi me?",
                        'options' => [
                            ['id' => 'a', 'text' => "Qadaǵan etiledi"],
                            ['id' => 'b', 'text' => "Jaqınlasıp keletirǵan poezd bolmasa ruxsat beriledi"],
                            ['id' => 'c', 'text' => "Ruxsat beriledi"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Qaysi tartibga solinmagan chorrahalarda quvib o'tishga ruxsat beriladi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Asosiy yo'lda harakatlanayotganda"],
                            ['id' => 'b', 'text' => "Teng ahamiyatli yo'llar chorrahasida"],
                            ['id' => 'c', 'text' => "Hech qanday tartibga solinmagan chorrahada quvib o'tib bo'lmaydi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Қайси тартибга солинмаган чорраҳаларда қувиб ўтишга рухсат берилади?",
                        'options' => [
                            ['id' => 'a', 'text' => "Асосий йўлда ҳаракатланаётганда"],
                            ['id' => 'b', 'text' => "Тенг аҳамиятли йўллар чорраҳасида"],
                            ['id' => 'c', 'text' => "Ҳеч қандай тартибга солинмаган чорраҳада қувиб ўтиб бўлмайди"]
                        ]
                    ],
                    'ru' => [
                        'question' => "На каких нерегулируемых перекрестках разрешен обгон?",
                        'options' => [
                            ['id' => 'a', 'text' => "При движении по главной дороге"],
                            ['id' => 'b', 'text' => "На перекрестке равнозначных дорог"],
                            ['id' => 'c', 'text' => "Обгон запрещен на любых нерегулируемых перекрестках"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Qaysı tártiplestirilmegen shedelerde quwıp ótiwge ruxsat beriledi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Baslı jolda háreketlengende"],
                            ['id' => 'b', 'text' => "Teń áhmiyetli jollar shedesinde"],
                            ['id' => 'c', 'text' => "Hech qanday tártiplestirilmegen shedede quwıp ótiwge bolmaydı"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Burilishdan oldin haydovchi o'ngga burilishni qaysi chetki chiziqdan bajarishi kerak?",
                        'options' => [
                            ['id' => 'a', 'text' => "Qatnov qismining chetki o'ng chizig'idan"],
                            ['id' => 'b', 'text' => "Istalgan chiziqdan, agar belgilar ruxsat bersa"],
                            ['id' => 'c', 'text' => "Chap chiziqdan, oldindan ogohlantirish signali berib"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Бурилишдан олдин ҳайдовчи ўнгга бурилишни қайси четки чизиқдан бажариши керак?",
                        'options' => [
                            ['id' => 'a', 'text' => "Қатнов қисмининг четки ўнг чизиғидан"],
                            ['id' => 'b', 'text' => "Исталган чизиқдан, агар белгилар рухсат берса"],
                            ['id' => 'c', 'text' => "Чап чизиқдан, олдиндан огоҳлантириш сигнали бериб"]
                        ]
                    ],
                    'ru' => [
                        'question' => "С какой полосы водитель обязан выполнять поворот направо?",
                        'options' => [
                            ['id' => 'a', 'text' => "С крайнего правого положения на проезжей части"],
                            ['id' => 'b', 'text' => "С любой полосы, если разрешают знаки"],
                            ['id' => 'c', 'text' => "С левой полосы, предварительно подав предупреждающий сигнал"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Burılıwdan aldın aydawshı ońǵa burılıwdı qaysı shetki qatarınan orınlawı kerek?",
                        'options' => [
                            ['id' => 'a', 'text' => "Háreket qatnaw bóliminiń shetki oń qatarınan"],
                            ['id' => 'b', 'text' => "Qálegen qatardan, eger belgiler ruxsat berse"],
                            ['id' => 'c', 'text' => "Shep qatardan, aldınnan eskertiw signalın berip"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Ishchi tormoz tizimi ishlamayotgan transport vositasini shatakka olishga ruxsat beriladimi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Faqat qattiq shatakka olish yoki qisman yuklash usuli bilan ruxsat etiladi"],
                            ['id' => 'b', 'text' => "Eshiluvchan (yumshoq) shatak yordamida ruxsat beriladi"],
                            ['id' => 'c', 'text' => "Mutlaqo taqiqlanadi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Ишчи тормоз тизими ишламаётган транспорт воситасини шатакка олишга рухсат бериладими?",
                        'options' => [
                            ['id' => 'a', 'text' => "Фақат қаттиқ шатакка олиш ёки қисман юклаш усули билан рухсат этилади"],
                            ['id' => 'b', 'text' => "Эшилувчан (юмшоқ) шатак ёрдамида рухсат берилади"],
                            ['id' => 'c', 'text' => "Мутлақо тақиқланади"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Разрешается ли буксировка транспортного средства с недействующей рабочей тормозной системой?",
                        'options' => [
                            ['id' => 'a', 'text' => "Разрешается только на жесткой сцепке или методом частичной погрузки"],
                            ['id' => 'b', 'text' => "Разрешается на гибкой сцепке"],
                            ['id' => 'c', 'text' => "Категорически запрещается"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Jumıs tormoz sisteması islemeytirǵan transport quralın shatakka alıwǵa ruxsat etiledi me?",
                        'options' => [
                            ['id' => 'a', 'text' => "Tek qattı shatakka alıw yamasa jartılay júklew usılı menen ruxsat etiledi"],
                            ['id' => 'b', 'text' => "Yumsaq shatak járdeminde ruxsat beriledi"],
                            ['id' => 'c', 'text' => "Qadaǵan etiledi"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Haydovchi qaysi hollarda o'z o'rnini tark etishi yoki transport vositasini qoldirishi mumkin?",
                        'options' => [
                            ['id' => 'a', 'text' => "Transport vositasining o'z-o'zidan harakatlanib ketishi va undan haydovchisiz foydalanishning oldini oluvchi choralar ko'rilgandan keyin"],
                            ['id' => 'b', 'text' => "Dvigatel o'chirilganidan keyin darhol"],
                            ['id' => 'c', 'text' => "Eshiklar qulflangan bo'lsa, dvigatel ishlab turganda ham ruxsat beriladi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Ҳайдовчи қайси ҳолларда ўз ўрнини тарк этиши ёки транспорт воситасини қолдириши мумкин?",
                        'options' => [
                            ['id' => 'a', 'text' => "Транспорт воситасининг ўз-ўзидан ҳаракатланиб кетиши ва ундан ҳайдовчисиз фойдаланишнинг олдини олувчи чоралар кўрилгандан кейин"],
                            ['id' => 'b', 'text' => "Двигатель ўчирилганидан кейин дарҳол"],
                            ['id' => 'c', 'text' => "Эшиклар қулфланган бўлса, двигатель ишлаб турганда ҳам рухсат берилади"]
                        ]
                    ],
                    'ru' => [
                        'question' => "В каких случаях водитель может покидать свое место или оставлять транспортное средство?",
                        'options' => [
                            ['id' => 'a', 'text' => "После принятия мер, исключающих самопроизвольное движение транспортного средства и использование его в отсутствие водителя"],
                            ['id' => 'b', 'text' => "Сразу после выключения двигателя"],
                            ['id' => 'c', 'text' => "Разрешается даже при работающем двигателе, если двери заперты"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Aydawshı qanday jaǵdaylarda óz ornın tastap ketiwi yamasa transport quralın qaldırıwı múmkin?",
                        'options' => [
                            ['id' => 'a', 'text' => "Transport quralınıń óz-ózi háreketlenip ketiwi hám ondan aydawshısız paydalanıwdıń aldın alıwshı sharalar kórilgennen keyin"],
                            ['id' => 'b', 'text' => "Tek dvigatel óshirilgennen keyin dárriw"],
                            ['id' => 'c', 'text' => "Esikler qulflanǵan bolsa, dvigatel islep turǵanda da ruxsat beriledi"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Teng ahamiyatli yo'llar chorrahasida tramvay va relssiz transport vositasi bir vaqtda yaqinlashsa, kim o'tish huquqiga ega?",
                        'options' => [
                            ['id' => 'a', 'text' => "Tramvay, uning harakat yo'nalishidan qat'i nazar, ustunlikka ega"],
                            ['id' => 'b', 'text' => "Tramvay faqat o'ng tomondan kelsa ustunlikka ega"],
                            ['id' => 'c', 'text' => "Relssiz transport vositasi, agar tramvay chapda bo'lsa"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Тенг аҳамиятли йўллар чорраҳасида трамвай ва релссиз транспорт воситаси бир вақтда яқинлашса, ким ўтиш ҳуқуқига эга?",
                        'options' => [
                            ['id' => 'a', 'text' => "Трамвай, унинг ҳаракат йўналишидан қатъи назар, устунликка ега"],
                            ['id' => 'b', 'text' => "Трамвай фақат ўнг томондан келса устунликка ега"],
                            ['id' => 'c', 'text' => "Релссиз транспорт воситаси, агар трамвай чапда бўлса"]
                        ]
                    ],
                    'ru' => [
                        'question' => "На перекрестке равнозначных дорог при одновременном приближении трамвая и безрельсового транспортного средства, кто имеет преимущество?",
                        'options' => [
                            ['id' => 'a', 'text' => "Трамвай имеет преимущество независимо от направления его движения"],
                            ['id' => 'b', 'text' => "Трамвай имеет преимущество только при приближении справа"],
                            ['id' => 'c', 'text' => "Безрельсовое транспортное средство, если трамвай находится слева"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Teń áhmiyetli jollar shedesinde tramvay hám relssiz transport quralı bir waqıtta jaqınlasa, kim ótiw huquqına ie?",
                        'options' => [
                            ['id' => 'a', 'text' => "Tramvay, onıń háreket baǵdarına qaramastan, ústinlikke ie"],
                            ['id' => 'b', 'text' => "Tramvay tek oń tárepten kelse ústinlikke ie"],
                            ['id' => 'c', 'text' => "Relssiz transport quralı, eger tramvay shepte bolsa"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a'
            ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Asosiy yo\'l belgisi qanday shaklga ega?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Sariq rangli romb',
          ],
          
          [
            'id' => 'b',
            'text' => 'Oq hoshiyali ko\'k uchburchak',
          ],
          
          [
            'id' => 'c',
            'text' => 'Qizil hoshiyali oq doira',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Асосий йўл белгиси қандай шаклга эга?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Сариқ рангли ромб',
          ],
          
          [
            'id' => 'b',
            'text' => 'Оқ ҳошияли кўк учбурчак',
          ],
          
          [
            'id' => 'c',
            'text' => 'Қизил ҳошияли оқ доира',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Какую форму имеет знак «Главная дорога»?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Желтый ромб',
          ],
          
          [
            'id' => 'b',
            'text' => 'Синий треугольник с белой каймой',
          ],
          
          [
            'id' => 'c',
            'text' => 'Белый круг с красной каймой',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Tiykarǵı jol belgisi qanday formaǵa iye?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Sarı reńli romb',
          ],
          
          [
            'id' => 'b',
            'text' => 'Aq shetli kók múyeshlik',
          ],
          
          [
            'id' => 'c',
            'text' => 'Qızıl shetli aq sheńber',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Qaysi transport vositasiga aylanma harakat chorrahasida birinchi o\'tish huquqi beriladi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Aylanmada harakatlanayotgan transport vositasiga',
          ],
          
          [
            'id' => 'b',
            'text' => 'Aylanmaga kirayotgan transport vositasiga',
          ],
          
          [
            'id' => 'c',
            'text' => 'Faqat yuk avtomobillariga',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Қайси транспорт воситасига айланма ҳаракат чорраҳасида биринчи ўтиш ҳуқуқи берилади?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Айланмада ҳаракатланаётган транспорт воситасига',
          ],
          
          [
            'id' => 'b',
            'text' => 'Айланмага кираётган транспорт воситасига',
          ],
          
          [
            'id' => 'c',
            'text' => 'Фақат юк автомобилларига',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Какое транспортное средство имеет преимущество на перекрестке с круговым движением?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Транспортное средство, движущееся по кругу',
          ],
          
          [
            'id' => 'b',
            'text' => 'Транспортное средство, въезжающее на круг',
          ],
          
          [
            'id' => 'c',
            'text' => 'Только грузовые автомобили',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Qaysı transport quralına aylanba háreket kóshesinde birinshi ótiw huqıqı beriledi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Aylanbada háreketlenip atırǵan transport quralına',
          ],
          
          [
            'id' => 'b',
            'text' => 'Aylanbaǵa kirip atırǵan transport quralına',
          ],
          
          [
            'id' => 'c',
            'text' => 'Tek jük avtomobillerine',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Yo\'lovchilarni tashish qoidalariga ko\'ra, yengil avtomobilning old o\'rindig\'ida necha yoshdan boshlab bolalarni maxsus o\'rindiqsiz olib yurish ruxsat etiladi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => '12 yoshdan',
          ],
          
          [
            'id' => 'b',
            'text' => '7 yoshdan',
          ],
          
          [
            'id' => 'c',
            'text' => '16 yoshdan',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Йўловчиларни ташиш қоидаларига кўра, енгил автомобилнинг олд ўриндиғида неча ёшдан бошлаб болаларни махсус ўриндиқсиз олиб юриш рухсат этилади?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => '12 ёшдан',
          ],
          
          [
            'id' => 'b',
            'text' => '7 ёшдан',
          ],
          
          [
            'id' => 'c',
            'text' => '16 ёшдан',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Согласно правилам перевозки пассажиров, с какого возраста разрешается перевозить детей на переднем сиденье легкового автомобиля без специального детского кресла?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'С 12 лет',
          ],
          
          [
            'id' => 'b',
            'text' => 'С 7 лет',
          ],
          
          [
            'id' => 'c',
            'text' => 'С 16 лет',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Jolawshılardı tasıw qaǵıydalarına kóre, jeńil avtomobildiń aldınǵı orındıǵında neshe jastan baslap balalardı arnawlı orındıqsız alıp júriw ruxsat etiledi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => '12 jastan',
          ],
          
          [
            'id' => 'b',
            'text' => '7 jastan',
          ],
          
          [
            'id' => 'c',
            'text' => '16 jastan',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Temir yo\'l kesishmasidan o\'tishda shlagbaum yopiq bo\'lsa, qayerda to\'xtash kerak?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'To\'xtash chizig\'i, belgi yoki shlagbaum oldida kamida 5 metr masofada',
          ],
          
          [
            'id' => 'b',
            'text' => 'Temir yo\'l iziga 2 metr qolganida',
          ],
          
          [
            'id' => 'c',
            'text' => 'Shlagbaumning bevosita tagida',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Темир йўл кесишмасидан ўтишда шлагбаум ёпиқ бўлса, қаерда тўхташ керак?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Тўхташ чизиғи, белги ёки шлагбаум олдида камида 5 метр масофада',
          ],
          
          [
            'id' => 'b',
            'text' => 'Темир йўл изига 2 метр қолганида',
          ],
          
          [
            'id' => 'c',
            'text' => 'Шлагбаумнинг бевосита тагида',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Где необходимо остановиться перед железнодорожным переездом при закрытом шлагбауме?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'У стоп-линии, знака или не ближе 5 метров от шлагбаума',
          ],
          
          [
            'id' => 'b',
            'text' => 'За 2 метра до железнодорожных путей',
          ],
          
          [
            'id' => 'c',
            'text' => 'Непосредственно под шлагбаумом',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Temir jol kespesinen ótiwde shlagbaum jabıq bolsa, qayerde toqtap qalıw kerek?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Toqtap qalıw sızıǵı, belgi yamasa shlagbaum aldında keminde 5 metr aralıqta',
          ],
          
          [
            'id' => 'b',
            'text' => 'Temir jol izine 2 metr qalǵanında',
          ],
          
          [
            'id' => 'c',
            'text' => 'Shlagbaumnıń tuwrıdan-tuwrı astında',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'O\'ng tomonga burilish qaysi qatordan amalga oshiriladi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Faqat eng o\'ng qatordan',
          ],
          
          [
            'id' => 'b',
            'text' => 'Har qanday qatordan',
          ],
          
          [
            'id' => 'c',
            'text' => 'Faqat o\'rta qatordan',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Ўнг томонга бурилиш қайси қатордан амалга оширилади?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Фақат энг ўнг қатордан',
          ],
          
          [
            'id' => 'b',
            'text' => 'Ҳар қандай қатордан',
          ],
          
          [
            'id' => 'c',
            'text' => 'Фақат ўрта қатордан',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Из какой полосы осуществляется поворот направо?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Только из крайней правой полосы',
          ],
          
          [
            'id' => 'b',
            'text' => 'Из любой полосы',
          ],
          
          [
            'id' => 'c',
            'text' => 'Только из средней полосы',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Oń tárepke burılıs qaysı qatardan ámelge asırıladı?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Tek eń oń qatardan',
          ],
          
          [
            'id' => 'b',
            'text' => 'Hár qanday qatardan',
          ],
          
          [
            'id' => 'c',
            'text' => 'Tek orta qatardan',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Xavfli yuklarni tashuvchi transport vositalari qanday ajratib ko\'rsatiladi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Maxsus \'Xavfli yuk\' belgisi va sariq miltillovchi chiroq bilan',
          ],
          
          [
            'id' => 'b',
            'text' => 'Ko\'k rangli miltillovchi chiroq bilan',
          ],
          
          [
            'id' => 'c',
            'text' => 'Ovozli signallar orqali',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Хавфли юкларни ташувчи транспорт воситалари қандай ажратиб кўрсатилади?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Махсус \'Хавфли юк\' белгиси ва сариқ милтилловчи чироқ билан',
          ],
          
          [
            'id' => 'b',
            'text' => 'Кўк рангли милтилловчи чироқ билан',
          ],
          
          [
            'id' => 'c',
            'text' => 'Овозли сигналлар орқали',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Как обозначаются транспортные средства, перевозящие опасные грузы?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Специальным знаком \'Опасный груз\' и желтым проблесковым маячком',
          ],
          
          [
            'id' => 'b',
            'text' => 'Синим проблесковым маячком',
          ],
          
          [
            'id' => 'c',
            'text' => 'Звуковыми сигналами',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Qáwipli jüklerdi tasıwshı transport quralları qanday etip ajıratıp kórsetiledi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Arnawlı \'Qáwipli jük\' belgisi hám sarı jıpılaqlı shıraq penen',
          ],
          
          [
            'id' => 'b',
            'text' => 'Kók reńli jıpılaqlı shıraq penen',
          ],
          
          [
            'id' => 'c',
            'text' => 'Dawıslı signallar arqalı',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Sutkaning qorong\'i vaqtida yoki ko\'rinish cheklangan sharoitda velosipedchilar qanday jihozlangan bo\'lishi kerak?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Oldinda oq, orqada qizil chiroq va yon tomonda nur qaytargichlar bilan',
          ],
          
          [
            'id' => 'b',
            'text' => 'Faqat orqada qizil chiroq bilan',
          ],
          
          [
            'id' => 'c',
            'text' => 'Faqat yorqin kiyimda bo\'lishi yetarli',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Сутканинг қоронғи вақтида ёки кўриниш чекланган шароитда велосипедчилар қандай жиҳозланган бўлиши керак?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Олдинда оқ, орқада қизил чироқ ва ён томонда нур қайтаргичлар билан',
          ],
          
          [
            'id' => 'b',
            'text' => 'Фақат орқада қизил чироқ билан',
          ],
          
          [
            'id' => 'c',
            'text' => 'Фақат ёрқин кийимда бўлиши етарли',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Как должны быть оборудованы велосипеды при движении в темное время суток или в условиях недостаточной видимости?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Фонарем белого цвета спереди, красным сзади и световозвращателями по бокам',
          ],
          
          [
            'id' => 'b',
            'text' => 'Только красным фонарем сзади',
          ],
          
          [
            'id' => 'c',
            'text' => 'Достаточно быть в яркой одежде',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Sutkanıń qarańǵı waqtında yamasa kórinisi sheklengen jaǵdayda velosipedshiler qanday úskenelengen bolıwı kerek?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Aldında aq, arqada qızıl shıraq hám qaptalında nur qaytargıshlar menen',
          ],
          
          [
            'id' => 'b',
            'text' => 'Tek arqada qızıl shıraq penen',
          ],
          
          [
            'id' => 'c',
            'text' => 'Tek jarqırawıq kiyimde bolıwı jetkilikli',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Quvib o\'tish qayerda taqiqlanadi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Piyodalar o\'tish joylarida va temir yo\'l kesishmalarida',
          ],
          
          [
            'id' => 'b',
            'text' => 'Barcha chorrahalarda',
          ],
          
          [
            'id' => 'c',
            'text' => 'Faqat yomg\'irli ob-havoda',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Қувиб ўтиш қаерда тақиқланади?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Пиёдалар ўтиш жойларида ва темир йўл кесишмаларида',
          ],
          
          [
            'id' => 'b',
            'text' => 'Барча чорраҳаларда',
          ],
          
          [
            'id' => 'c',
            'text' => 'Фақат ёмғирли об-ҳавода',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Где запрещается обгон?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'На пешеходных переходах и железнодорожных переездах',
          ],
          
          [
            'id' => 'b',
            'text' => 'На всех перекрестках',
          ],
          
          [
            'id' => 'c',
            'text' => 'Только в дождливую погоду',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Quwıp ótiw qayerde qadaǵan etiledi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Piyadalar ótiw orınlarında hám temir jol kespelerinde',
          ],
          
          [
            'id' => 'b',
            'text' => 'Barlıq kóshe kesispelerinde',
          ],
          
          [
            'id' => 'c',
            'text' => 'Tek jawınlı hawa-rayında',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Avtomagistralda orqaga harakatlanishga ruxsat etiladimi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Qat\'iyan taqiqlanadi',
          ],
          
          [
            'id' => 'b',
            'text' => 'Ha, faqat chekka qatorda',
          ],
          
          [
            'id' => 'c',
            'text' => 'Ha, agar ko\'rinish yaxshi bo\'lsa',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Автомагистралда орқага ҳаракатланишга рухсат этиладими?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Қатъиян тақиқланади',
          ],
          
          [
            'id' => 'b',
            'text' => 'Ҳа, фақат чекка қаторда',
          ],
          
          [
            'id' => 'c',
            'text' => 'Ҳа, агар кўриниш яхши бўлса',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Разрешается ли движение задним ходом на автомагистрали?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Строго запрещено',
          ],
          
          [
            'id' => 'b',
            'text' => 'Да, только на обочине',
          ],
          
          [
            'id' => 'c',
            'text' => 'Да, если хорошая видимость',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Avtomagistralda artqa háreketleniwge ruxsat etiledimi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Qatań túrde qadaǵan etiledi',
          ],
          
          [
            'id' => 'b',
            'text' => 'Awa, tek shetki qatarda',
          ],
          
          [
            'id' => 'c',
            'text' => 'Awa, eger kórinisi jaqsı bolsa',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Ko\'k rangli miltillovchi mayoqchasi yoqilgan transport vositasi yaqinlashganda piyodalar qanday harakat qilishi kerak?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Qatnov qismiga chiqmasligi yoki uni darhol tark etishi kerak',
          ],
          
          [
            'id' => 'b',
            'text' => 'Harakatni davom ettirishi mumkin',
          ],
          
          [
            'id' => 'c',
            'text' => 'Transport vositasiga yo\'l berishi majburiy emas',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Кўк рангли милтилловчи маёқчаси ёқилган транспорт воситаси яқинлашганда пиёдалар қандай ҳаракат қилиши керак?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Қатнов қисмига чиқмаслиги ёки уни дарҳол тарк этиши керак',
          ],
          
          [
            'id' => 'b',
            'text' => 'Ҳаракатни давом эттириши мумкин',
          ],
          
          [
            'id' => 'c',
            'text' => 'Транспорт воситасига йўл бериши мажбурий эмас',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Как должны действовать пешеходы при приближении транспортного средства с включенным синим проблесковым маячком?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Воздержаться от перехода проезжей части или немедленно освободить ее',
          ],
          
          [
            'id' => 'b',
            'text' => 'Могут продолжать движение',
          ],
          
          [
            'id' => 'c',
            'text' => 'Не обязаны уступать дорогу транспортному средству',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Kók reńli jıpılaqlı mayachogi jaǵılǵan transport quralı jaqınlasqanda piyadalar qanday háreket etiwi kerek?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Katnaw bólimine shıqpawı yamasa onı tezde tárk etiwi kerek',
          ],
          
          [
            'id' => 'b',
            'text' => 'Hareketti dawam ettiriwi múmkin',
          ],
          
          [
            'id' => 'c',
            'text' => 'Transport quralına jol beriwi májbúriy emes',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],

        ];

        // Level 2 (Advanced / Harder) YHQ questions
        $level2Questions = [
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Tirband chorrahada yoniq miltillovchi ko'k chiroq va maxsus tovushli signal (sirena) bilan kelayotgan tez yordam mashinasiga qaysi haydovchilar yo'l berishi shart?",
                        'options' => [
                            ['id' => 'a', 'text' => "Barcha yo'nalishdagi transport vositalari haydovchilari, chorraha yashil yoki qizil ishorada bo'lishidan qat'i nazar"],
                            ['id' => 'b', 'text' => "Faqat tez yordam mashinasining harakat yo'nalishiga to'g'ri keluvchi chiziqdagi haydovchilar"],
                            ['id' => 'c', 'text' => "Faqat chorrahani kesib o'tayotgan ikkinchi darajali yo'ldagi haydovchilar"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Тирбанд чорраҳада ёниқ милтилловчи кўк чироқ ва махсус товушли сигнал (сирена) билан келаётган тез ёрдам машинасига қайси ҳайдовчилар йўл бериши шарт?",
                        'options' => [
                            ['id' => 'a', 'text' => "Барча йўналишдаги транспорт воситалари ҳайдовчилари, чорраҳа яшил ёки қизил ишорада бўлишидан қатъи назар"],
                            ['id' => 'b', 'text' => "Фақат тез ёрдам машинасининг ҳаракат йўналишига тўғри келувчи чизиқдаги ҳайдовчилар"],
                            ['id' => 'c', 'text' => "Фақат чорраҳани кесиб ўтаётган иккинчи даражали йўлдаги ҳайдовчилар"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Кто из водителей обязан уступить дорогу машине скорой помощи с включенными синей мигалкой и звуковым сигналом на перекрестке?",
                        'options' => [
                            ['id' => 'a', 'text' => "Водители всех направлений, независимо от сигналов светофора на перекрестке"],
                            ['id' => 'b', 'text' => "Только водители, двигающиеся в одном направлении со скорой помощью"],
                            ['id' => 'c', 'text' => "Только водители на второстепенной дороге"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Kestedegi tirbandlikta kók jıpılaqlı belgi hám sirena menen keleyatqan tez járdem mashinasına qaysı aydawshılar jol beriwi shart?",
                        'options' => [
                            ['id' => 'a', 'text' => "Barlıq baǵdardaǵı transport quralı aydawshıları, keste jasıl yamasa qızıl bolıwına qaramastan"],
                            ['id' => 'b', 'text' => "Tek tez járdem mashinası háreket baǵdarına tuwrı keletuǵın qatardaǵı aydawshılar"],
                            ['id' => 'c', 'text' => "Tek kesteden ótip baratqan ekinshi dárejeli joldaǵı aydawshılar"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a',
                'level' => 2
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Svetofor ishlayotgan chorrahada tartibga soluvchining o'ng qo'li to'g'riga cho'zilgan bo'lib, siz uning chap yonidan yaqinlashyapsiz. Qaysi yo'nalishda harakatlanishingizga ruxsat beriladi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Barcha yo'nalishlarda (to'g'riga, o'ngga, chapga va orqaga qayrilishga)"],
                            ['id' => 'b', 'text' => "Faqat to'g'riga va o'ngga"],
                            ['id' => 'c', 'text' => "Faqat chapga va orqaga qayrilishga"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Светофор ишлаётган чорраҳада тартибга солувчининг ўнг қўли тўғрига чўзилган бўлиб, сиз унинг чап ёнидан яқинлашяпсиз. Қайси йўналишда ҳаракатланишингизга рухсат берилади?",
                        'options' => [
                            ['id' => 'a', 'text' => "Барча йўналишларда (тўғрига, ўнгга, чапга ва орқага қайрилишга)"],
                            ['id' => 'b', 'text' => "Фақат тўғрига ва ўнгга"],
                            ['id' => 'c', 'text' => "Фақат чапга ва орқага қайрилишга"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Если регулировщик на перекрестке вытянул правую руку вперед, а вы приближаетесь с его левого бока. В каком направлении вам разрешено движение?",
                        'options' => [
                            ['id' => 'a', 'text' => "Во всех направлениях (прямо, направо, налево и в обратном направлении)"],
                            ['id' => 'b', 'text' => "Только прямо и направо"],
                            ['id' => 'c', 'text' => "Только налево и в обратном направлении"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Svetofor islep turǵan kestedegi tártiplestiriwshiniń oń qolı tuwrıǵa sozılǵan bolıp, siz onıń shep tárepinen jaqınlasıp atırsız. Qaysı baǵdarda háreketleniwińizge ruxsat etiledi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Barlıq baǵdarlarda (tuwrıǵa, ońǵa, shepke hám artqa qayrılıwǵa)"],
                            ['id' => 'b', 'text' => "Tek tuwrıǵa hám ońǵa"],
                            ['id' => 'c', 'text' => "Tek shepke hám artqa qayrılıwǵa"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a',
                'level' => 2
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Ko'priklarda, estakadalarda va ularning ostida quvib o'tishga ruxsat etiladimi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Mutlaqo taqiqlanadi"],
                            ['id' => 'b', 'text' => "Ruxsat etiladi, agar ko'rinish 100 metrdan ortiq bo'lsa"],
                            ['id' => 'c', 'text' => "Faqat sekin harakatlanuvchi transport vositalarini quvib o'tishga ruxsat beriladi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Кўприкларда, эстакадаларда ва уларнинг остида қувиб ўтишга рухсат этиладими?",
                        'options' => [
                            ['id' => 'a', 'text' => "Мутлақо тақиқланади"],
                            ['id' => 'b', 'text' => "Рухсат этилади, агар кўриниш 100 метрдан ортиқ бўлса"],
                            ['id' => 'c', 'text' => "Фақат секин ҳаракатланувчи транспорт воситаларини қувиб ўтишга рухсат берилади"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Разрешается ли обгон на мостах, путепроводах, эстакадах и под ними?",
                        'options' => [
                            ['id' => 'a', 'text' => "Категорически запрещается"],
                            ['id' => 'b', 'text' => "Разрешается, если видимость дороги более 100 метров"],
                            ['id' => 'c', 'text' => "Разрешается обгон только тихоходных транспортных средств"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Kópirlerde, estakadalarda hám olardıń astında quwıp ótiwge ruxsat etiledi me?",
                        'options' => [
                            ['id' => 'a', 'text' => "Qadaǵan etiledi"],
                            ['id' => 'b', 'text' => "Ruxsat etiledi, eger kóriniw 100 metrden artıq bolsa"],
                            ['id' => 'c', 'text' => "Tek áste háreketleniwshi transport quralların quwıp ótiwge ruxsat etiledi"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a',
                'level' => 2
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Temir yo'llar kesishmasi oldida 'To'xtash' (Stop) belgisi yoki svetofor bo'lmaganda, yaqinlashib kelayotgan poyezd bo'lsa, transport vositasi relsdan kamida necha metr masofada to'xtashi kerak?",
                        'options' => [
                            ['id' => 'a', 'text' => "Kamida 10 metr masofada"],
                            ['id' => 'b', 'text' => "Kamida 5 metr masofada"],
                            ['id' => 'c', 'text' => "Kamida 20 metr masofada"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Темир йўллар кесишмаси олдида 'Тўхташ' (Stop) белгиси ёки светофор бўлмаганда, яқинлашиб келаётган поезд бўлса, транспорт воситаси рельсдан камида неча метр масофада тўхташи керак?",
                        'options' => [
                            ['id' => 'a', 'text' => "Камида 10 метр масофада"],
                            ['id' => 'b', 'text' => "Камида 5 метр масофада"],
                            ['id' => 'c', 'text' => "Камида 20 метр масофада"]
                        ]
                    ],
                    'ru' => [
                        'question' => "На каком наименьшем расстоянии от рельса должен остановиться водитель при отсутствии знака 'Стоп' и светофора при приближающемся поезде?",
                        'options' => [
                            ['id' => 'a', 'text' => "Не ближе 10 метров"],
                            ['id' => 'b', 'text' => "Не ближе 5 метров"],
                            ['id' => 'c', 'text' => "Не ближе 20 метров"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Temir jol kespesi aldında 'Stop' belgisi yamasa svetofor bolmaǵanda, jaqınlasıp atırǵan poezd bolsa, transport quralı relsten neshe metr aralıqta toqtawı kerek?",
                        'options' => [
                            ['id' => 'a', 'text' => "Keminde 10 metr aralıqta"],
                            ['id' => 'b', 'text' => "Keminde 5 metr aralıqta"],
                            ['id' => 'c', 'text' => "Keminde 20 metr aralıqta"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a',
                'level' => 2
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Tik nishablikda (pastga tushishda) to'siq bo'lganda, qarama-qarshi kelayotgan transport vositasiga kim yo'l berishi kerak?",
                        'options' => [
                            ['id' => 'a', 'text' => "Nishablikka pastga tushib kelayotgan transport vositasi haydovchisi"],
                            ['id' => 'b', 'text' => "Tepalikka yuqoriga ko'tarilayotgan transport vositasi haydovchisi"],
                            ['id' => 'c', 'text' => "To'siq qaysi tomonda joylashgan bo'lsa, o'sha tomondagi transport vositasi haydovchisi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Тик нишабликда (пастга тушишда) тўсиқ бўлганда, қарама-қарши келаётган транспорт воситасига ким йўл бериши керак?",
                        'options' => [
                            ['id' => 'a', 'text' => "Нишабликка пастга тушиб келаётган транспорт воситаси ҳайдовчиси"],
                            ['id' => 'b', 'text' => "Тепаликка юқорига кўтарилаётган транспорт воситаси ҳайдовчиси"],
                            ['id' => 'c', 'text' => "Тўсиқ қайси томонда жойлашган бўлса, ўша томондаги транспорт воситаси ҳайдовчиси"]
                        ]
                    ],
                    'ru' => [
                        'question' => "При наличии препятствия на крутом спуске, кто обязан уступить дорогу?",
                        'options' => [
                            ['id' => 'a', 'text' => "Водитель транспортного средства, движущегося на спуск"],
                            ['id' => 'b', 'text' => "Водитель транспортного средства, движущегося на подъем"],
                            ['id' => 'c', 'text' => "Водитель, на стороне которого находится препятствие"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Kút kólbeylikte (tómengine túsiwde) tosqınlıq bolǵanda, qarsıdan keleyatqan transport quralına kim jol beriwi kerek?",
                        'options' => [
                            ['id' => 'a', 'text' => "Kólbeylikte tómengine túsip keleyatqan transport quralı aydawshısı"],
                            ['id' => 'b', 'text' => "Tóbepenge joqarı kóterilip atırǵan transport quralı aydawshısı"],
                            ['id' => 'c', 'text' => "Tosqınlıq qaysı tárepte jaylasqan bolsa, sol táreptegi transport quralı aydawshısı"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a',
                'level' => 2
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Piyodalar o'tish joyida yoki uning oldida quvib o'tish taqiqlanadimi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Piyodalar o'tish joyida va uning oldida har qanday holatda taqiqlanadi"],
                            ['id' => 'b', 'text' => "Taqiqlanadi, faqat yo'lda piyodalar bo'lgandagina"],
                            ['id' => 'c', 'text' => "Ruxsat etiladi, agar ko'rinish 100 metrdan ortiq bo'lsa"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Пиёдалар ўтиш жойида ёки унинг олдида қувиб ўтиш тақиқланадими?",
                        'options' => [
                            ['id' => 'a', 'text' => "Пиёдалар ўтиш жойида ва унинг олдида ҳар қanday ҳолатда тақиқланади"],
                            ['id' => 'b', 'text' => "Тақиқланади, фақат йўлда пиёдалар бўлгандагина"],
                            ['id' => 'c', 'text' => "Рухсат этилади, агар кўриниш 100 метрдан ортиқ бўлса"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Запрещается ли обгон на пешеходном переходе и перед ним?",
                        'options' => [
                            ['id' => 'a', 'text' => "Запрещается во всех случаях на пешеходном переходе и непосредственно перед ним"],
                            ['id' => 'b', 'text' => "Запрещается только при наличии на нем пешеходов"],
                            ['id' => 'c', 'text' => "Разрешается при видимости дороги более 100 метров"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Piyodalar ótiw ornında yamasa onıń aldında quwıp ótiw qadaǵan etiledi me?",
                        'options' => [
                            ['id' => 'a', 'text' => "Piyodalar ótiw ornında hám onıń aldında qálegen jaǵdayda qadaǵan etiledi"],
                            ['id' => 'b', 'text' => "Qadaǵan etiledi, tek jolda piyodalar bolǵandagina"],
                            ['id' => 'c', 'text' => "Ruxsat etiledi, eger kóriniw 100 metrden artıq bolsa"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a',
                'level' => 2
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Yo'nalishli transport vositalari to'xtash joylariga kamida necha metr qolganda to'xtash va to'xtab turish taqiqlanadi (yo'lovchilarni tushirish/chiqarishdan tashqari)?",
                        'options' => [
                            ['id' => 'a', 'text' => "15 metrdan kam bo'lmagan masofada"],
                            ['id' => 'b', 'text' => "10 metrdan kam bo'lmagan masofada"],
                            ['id' => 'c', 'text' => "30 metrdan kam bo'lmagan masofada"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Йўналишли транспорт воситалари тўхтиш жойларига камида неча метр қолганда тўхташ ва тўхтаб туриш тақиқланади (йўловчиларни тушириш/чиқаришдан ташқари)?",
                        'options' => [
                            ['id' => 'a', 'text' => "15 метрдан кам бўлмаган масофада"],
                            ['id' => 'b', 'text' => "10 метрдан кам бўлмаган масофаda"],
                            ['id' => 'c', 'text' => "30 метрдан кам бўлмаган масофада"]
                        ]
                    ],
                    'ru' => [
                        'question' => "На каком наименьшем расстоянии от мест остановок маршрутных транспортных средств запрещается остановка и стоянка (кроме посадки и высадки пассажиров)?",
                        'options' => [
                            ['id' => 'a', 'text' => "Не ближе 15 метров"],
                            ['id' => 'b', 'text' => "Не ближе 10 метров"],
                            ['id' => 'c', 'text' => "Не ближе 30 метров"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Baǵdarlı transport quralı toqtaw orınlarına keminde neshe metr qalǵanda toqtaw hám turıw qadaǵan etiledi (passajirlerdi túsiriw/mindiriwden basqa)?",
                        'options' => [
                            ['id' => 'a', 'text' => "15 metrden kem bolmaǵan aralıqta"],
                            ['id' => 'b', 'text' => "10 metrden kem bolmaǵan aralıqta"],
                            ['id' => 'c', 'text' => "30 metrden kem bolmaǵan aralıqta"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a',
                'level' => 2
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Mexanik transport vositalarini shatakka olishda harakatlanish tezligi soatiga necha kilometrdan oshmasligi kerak?",
                        'options' => [
                            ['id' => 'a', 'text' => "50 km/s dan oshmasligi kerak"],
                            ['id' => 'b', 'text' => "60 km/s dan oshmasligi kerak"],
                            ['id' => 'c', 'text' => "70 km/s dan oshmasligi kerak"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Механик транспорт воситаларини шатакка олишда ҳаракатланиш тезлиги соатига неча километрдан ошмаслиги керак?",
                        'options' => [
                            ['id' => 'a', 'text' => "50 км/с дан ошмаслиги керак"],
                            ['id' => 'b', 'text' => "60 км/с дан ошмаслиги керак"],
                            ['id' => 'c', 'text' => "70 км/с дан ошмаслиги керак"]
                        ]
                    ],
                    'ru' => [
                        'question' => "С какой максимальной скоростью разрешается движение при буксировке механических транспортных средств?",
                        'options' => [
                            ['id' => 'a', 'text' => "Не более 50 км/ч"],
                            ['id' => 'b', 'text' => "Не более 60 км/ч"],
                            ['id' => 'c', 'text' => "Не более 70 км/ч"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Mexanik transport quralın shatakka alıwda háreketleniw tezligi saatına neshe kilometrden aspawı kerek?",
                        'options' => [
                            ['id' => 'a', 'text' => "50 km/s dan aspawı kerek"],
                            ['id' => 'b', 'text' => "60 km/s dan aspawı kerek"],
                            ['id' => 'c', 'text' => "70 km/s dan aspawı kerek"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a',
                'level' => 2
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Tartibga soluvchining qo'lini yuqoriga ko'tarishi nimani bildiradi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Barcha transport vositalari va piyodalarning harakatlanishi taqiqlanadi (sariq chiroq kabi)"],
                            ['id' => 'b', 'text' => "Faqat tramvaylar harakatlanishi taqiqlanadi"],
                            ['id' => 'c', 'text' => "Chapga burilayotgan transport vositalariga yo'l berishni talab qiladi"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Тартибга солувчининг қўлини юқорига кўтариши нимани билдиради?",
                        'options' => [
                            ['id' => 'a', 'text' => "Барча транспорт воситалари ва пиёдаларнинг ҳаракатланиши тақиқланади (сариқ чироқ каби)"],
                            ['id' => 'b', 'text' => "Фақат трамвайлар ҳаракатланиши тақиқланади"],
                            ['id' => 'c', 'text' => "Чапга бурилаётган транспорт воситаларига йўл беришни талаб қилади"]
                        ]
                    ],
                    'ru' => [
                        'question' => "Что означает поднятая вверх рука регулировщика?",
                        'options' => [
                            ['id' => 'a', 'text' => "Движение всех транспортных средств и пешеходов запрещено (аналог желтого сигнала)"],
                            ['id' => 'b', 'text' => "Движение запрещено только для трамваев"],
                            ['id' => 'c', 'text' => "Требует уступить дорогу транспортным средствам, поворачивающим налево"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Tártiplestiriwshiniń qolın joqarı kóteriwi neni bildiredi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Barlıq transport quralı hám piyodalardıń háreketi qadaǵan etiledi (sarı belgi sıyaqlı)"],
                            ['id' => 'b', 'text' => "Tek tramvaylar háreketi qadaǵan etiledi"],
                            ['id' => 'c', 'text' => "Shepke burılıp atırǵan transport quralına jol beriwdi talap etedi"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a',
                'level' => 2
            ],
            [
                'translations' => [
                    'uz_lat' => [
                        'question' => "Yo'lning ko'rinishi kamida necha metr bo'lgan joylarda orqaga qayrilib olish (U-turn) taqiqlanadi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Yo'l ko'rinishi kamida 100 metrdan kam bo'lgan joylarda"],
                            ['id' => 'b', 'text' => "Yo'l ko'rinishi kamida 50 metrdan kam bo'lgan joylarda"],
                            ['id' => 'c', 'text' => "Yo'l ko'rinishi kamida 150 metrdan kam bo'lgan joylarda"]
                        ]
                    ],
                    'uz_cyr' => [
                        'question' => "Йўлнинг кўриниши камида неча метр бўлган жойларда орқага қайрилиб олиш (U-turn) тақиқланади?",
                        'options' => [
                            ['id' => 'a', 'text' => "Йўл кўриниши камида 100 метрдан кам бўлган жойларда"],
                            ['id' => 'b', 'text' => "Йўл кўриниши камида 50 метрдан кам бўлган жойларда"],
                            ['id' => 'c', 'text' => "Йўл кўриниши камида 150 метрдан кам бўлган жойларда"]
                        ]
                    ],
                    'ru' => [
                        'question' => "В каких местах запрещен разворот по условиям видимости дороги?",
                        'options' => [
                            ['id' => 'a', 'text' => "При видимости дороги хотя бы в одном направлении менее 100 метров"],
                            ['id' => 'b', 'text' => "При видимости дороги менее 50 метров"],
                            ['id' => 'c', 'text' => "При видимости дороги менее 150 метров"]
                        ]
                    ],
                    'qr' => [
                        'question' => "Joldıń kóriniwi keminde neshe metr bolǵan orınlarda artqa qayrılıw (U-turn) qadaǵan etiledi?",
                        'options' => [
                            ['id' => 'a', 'text' => "Jol kóriniwi keminde 100 metrden kem bolǵan orınlarda"],
                            ['id' => 'b', 'text' => "Jol kóriniwi keminde 50 metrden kem bolǵan orınlarda"],
                            ['id' => 'c', 'text' => "Jol kóriniwi keminde 150 metrden kem bolǵan orınlarda"]
                        ]
                    ]
                ],
                'correct_option_id' => 'a',
                'level' => 2
            ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Asosiy yo\'l belgisi qanday shaklga ega?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Sariq rangli romb',
          ],
          
          [
            'id' => 'b',
            'text' => 'Oq hoshiyali ko\'k uchburchak',
          ],
          
          [
            'id' => 'c',
            'text' => 'Qizil hoshiyali oq doira',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Асосий йўл белгиси қандай шаклга эга?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Сариқ рангли ромб',
          ],
          
          [
            'id' => 'b',
            'text' => 'Оқ ҳошияли кўк учбурчак',
          ],
          
          [
            'id' => 'c',
            'text' => 'Қизил ҳошияли оқ доира',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Какую форму имеет знак «Главная дорога»?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Желтый ромб',
          ],
          
          [
            'id' => 'b',
            'text' => 'Синий треугольник с белой каймой',
          ],
          
          [
            'id' => 'c',
            'text' => 'Белый круг с красной каймой',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Tiykarǵı jol belgisi qanday formaǵa iye?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Sarı reńli romb',
          ],
          
          [
            'id' => 'b',
            'text' => 'Aq shetli kók múyeshlik',
          ],
          
          [
            'id' => 'c',
            'text' => 'Qızıl shetli aq sheńber',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Qaysi transport vositasiga aylanma harakat chorrahasida birinchi o\'tish huquqi beriladi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Aylanmada harakatlanayotgan transport vositasiga',
          ],
          
          [
            'id' => 'b',
            'text' => 'Aylanmaga kirayotgan transport vositasiga',
          ],
          
          [
            'id' => 'c',
            'text' => 'Faqat yuk avtomobillariga',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Қайси транспорт воситасига айланма ҳаракат чорраҳасида биринчи ўтиш ҳуқуқи берилади?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Айланмада ҳаракатланаётган транспорт воситасига',
          ],
          
          [
            'id' => 'b',
            'text' => 'Айланмага кираётган транспорт воситасига',
          ],
          
          [
            'id' => 'c',
            'text' => 'Фақат юк автомобилларига',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Какое транспортное средство имеет преимущество на перекрестке с круговым движением?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Транспортное средство, движущееся по кругу',
          ],
          
          [
            'id' => 'b',
            'text' => 'Транспортное средство, въезжающее на круг',
          ],
          
          [
            'id' => 'c',
            'text' => 'Только грузовые автомобили',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Qaysı transport quralına aylanba háreket kóshesinde birinshi ótiw huqıqı beriledi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Aylanbada háreketlenip atırǵan transport quralına',
          ],
          
          [
            'id' => 'b',
            'text' => 'Aylanbaǵa kirip atırǵan transport quralına',
          ],
          
          [
            'id' => 'c',
            'text' => 'Tek jük avtomobillerine',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Yo\'lovchilarni tashish qoidalariga ko\'ra, yengil avtomobilning old o\'rindig\'ida necha yoshdan boshlab bolalarni maxsus o\'rindiqsiz olib yurish ruxsat etiladi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => '12 yoshdan',
          ],
          
          [
            'id' => 'b',
            'text' => '7 yoshdan',
          ],
          
          [
            'id' => 'c',
            'text' => '16 yoshdan',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Йўловчиларни ташиш қоидаларига кўра, енгил автомобилнинг олд ўриндиғида неча ёшдан бошлаб болаларни махсус ўриндиқсиз олиб юриш рухсат этилади?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => '12 ёшдан',
          ],
          
          [
            'id' => 'b',
            'text' => '7 ёшдан',
          ],
          
          [
            'id' => 'c',
            'text' => '16 ёшдан',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Согласно правилам перевозки пассажиров, с какого возраста разрешается перевозить детей на переднем сиденье легкового автомобиля без специального детского кресла?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'С 12 лет',
          ],
          
          [
            'id' => 'b',
            'text' => 'С 7 лет',
          ],
          
          [
            'id' => 'c',
            'text' => 'С 16 лет',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Jolawshılardı tasıw qaǵıydalarına kóre, jeńil avtomobildiń aldınǵı orındıǵında neshe jastan baslap balalardı arnawlı orındıqsız alıp júriw ruxsat etiledi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => '12 jastan',
          ],
          
          [
            'id' => 'b',
            'text' => '7 jastan',
          ],
          
          [
            'id' => 'c',
            'text' => '16 jastan',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Temir yo\'l kesishmasidan o\'tishda shlagbaum yopiq bo\'lsa, qayerda to\'xtash kerak?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'To\'xtash chizig\'i, belgi yoki shlagbaum oldida kamida 5 metr masofada',
          ],
          
          [
            'id' => 'b',
            'text' => 'Temir yo\'l iziga 2 metr qolganida',
          ],
          
          [
            'id' => 'c',
            'text' => 'Shlagbaumning bevosita tagida',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Темир йўл кесишмасидан ўтишда шлагбаум ёпиқ бўлса, қаерда тўхташ керак?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Тўхташ чизиғи, белги ёки шлагбаум олдида камида 5 метр масофада',
          ],
          
          [
            'id' => 'b',
            'text' => 'Темир йўл изига 2 метр қолганида',
          ],
          
          [
            'id' => 'c',
            'text' => 'Шлагбаумнинг бевосита тагида',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Где необходимо остановиться перед железнодорожным переездом при закрытом шлагбауме?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'У стоп-линии, знака или не ближе 5 метров от шлагбаума',
          ],
          
          [
            'id' => 'b',
            'text' => 'За 2 метра до железнодорожных путей',
          ],
          
          [
            'id' => 'c',
            'text' => 'Непосредственно под шлагбаумом',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Temir jol kespesinen ótiwde shlagbaum jabıq bolsa, qayerde toqtap qalıw kerek?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Toqtap qalıw sızıǵı, belgi yamasa shlagbaum aldında keminde 5 metr aralıqta',
          ],
          
          [
            'id' => 'b',
            'text' => 'Temir jol izine 2 metr qalǵanında',
          ],
          
          [
            'id' => 'c',
            'text' => 'Shlagbaumnıń tuwrıdan-tuwrı astında',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'O\'ng tomonga burilish qaysi qatordan amalga oshiriladi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Faqat eng o\'ng qatordan',
          ],
          
          [
            'id' => 'b',
            'text' => 'Har qanday qatordan',
          ],
          
          [
            'id' => 'c',
            'text' => 'Faqat o\'rta qatordan',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Ўнг томонга бурилиш қайси қатордан амалга оширилади?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Фақат энг ўнг қатордан',
          ],
          
          [
            'id' => 'b',
            'text' => 'Ҳар қандай қатордан',
          ],
          
          [
            'id' => 'c',
            'text' => 'Фақат ўрта қатордан',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Из какой полосы осуществляется поворот направо?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Только из крайней правой полосы',
          ],
          
          [
            'id' => 'b',
            'text' => 'Из любой полосы',
          ],
          
          [
            'id' => 'c',
            'text' => 'Только из средней полосы',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Oń tárepke burılıs qaysı qatardan ámelge asırıladı?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Tek eń oń qatardan',
          ],
          
          [
            'id' => 'b',
            'text' => 'Hár qanday qatardan',
          ],
          
          [
            'id' => 'c',
            'text' => 'Tek orta qatardan',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Xavfli yuklarni tashuvchi transport vositalari qanday ajratib ko\'rsatiladi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Maxsus \'Xavfli yuk\' belgisi va sariq miltillovchi chiroq bilan',
          ],
          
          [
            'id' => 'b',
            'text' => 'Ko\'k rangli miltillovchi chiroq bilan',
          ],
          
          [
            'id' => 'c',
            'text' => 'Ovozli signallar orqali',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Хавфли юкларни ташувчи транспорт воситалари қандай ажратиб кўрсатилади?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Махсус \'Хавфли юк\' белгиси ва сариқ милтилловчи чироқ билан',
          ],
          
          [
            'id' => 'b',
            'text' => 'Кўк рангли милтилловчи чироқ билан',
          ],
          
          [
            'id' => 'c',
            'text' => 'Овозли сигналлар орқали',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Как обозначаются транспортные средства, перевозящие опасные грузы?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Специальным знаком \'Опасный груз\' и желтым проблесковым маячком',
          ],
          
          [
            'id' => 'b',
            'text' => 'Синим проблесковым маячком',
          ],
          
          [
            'id' => 'c',
            'text' => 'Звуковыми сигналами',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Qáwipli jüklerdi tasıwshı transport quralları qanday etip ajıratıp kórsetiledi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Arnawlı \'Qáwipli jük\' belgisi hám sarı jıpılaqlı shıraq penen',
          ],
          
          [
            'id' => 'b',
            'text' => 'Kók reńli jıpılaqlı shıraq penen',
          ],
          
          [
            'id' => 'c',
            'text' => 'Dawıslı signallar arqalı',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Sutkaning qorong\'i vaqtida yoki ko\'rinish cheklangan sharoitda velosipedchilar qanday jihozlangan bo\'lishi kerak?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Oldinda oq, orqada qizil chiroq va yon tomonda nur qaytargichlar bilan',
          ],
          
          [
            'id' => 'b',
            'text' => 'Faqat orqada qizil chiroq bilan',
          ],
          
          [
            'id' => 'c',
            'text' => 'Faqat yorqin kiyimda bo\'lishi yetarli',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Сутканинг қоронғи вақтида ёки кўриниш чекланган шароитда велосипедчилар қандай жиҳозланган бўлиши керак?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Олдинда оқ, орқада қизил чироқ ва ён томонда нур қайтаргичлар билан',
          ],
          
          [
            'id' => 'b',
            'text' => 'Фақат орқада қизил чироқ билан',
          ],
          
          [
            'id' => 'c',
            'text' => 'Фақат ёрқин кийимда бўлиши етарли',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Как должны быть оборудованы велосипеды при движении в темное время суток или в условиях недостаточной видимости?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Фонарем белого цвета спереди, красным сзади и световозвращателями по бокам',
          ],
          
          [
            'id' => 'b',
            'text' => 'Только красным фонарем сзади',
          ],
          
          [
            'id' => 'c',
            'text' => 'Достаточно быть в яркой одежде',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Sutkanıń qarańǵı waqtında yamasa kórinisi sheklengen jaǵdayda velosipedshiler qanday úskenelengen bolıwı kerek?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Aldında aq, arqada qızıl shıraq hám qaptalında nur qaytargıshlar menen',
          ],
          
          [
            'id' => 'b',
            'text' => 'Tek arqada qızıl shıraq penen',
          ],
          
          [
            'id' => 'c',
            'text' => 'Tek jarqırawıq kiyimde bolıwı jetkilikli',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Quvib o\'tish qayerda taqiqlanadi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Piyodalar o\'tish joylarida va temir yo\'l kesishmalarida',
          ],
          
          [
            'id' => 'b',
            'text' => 'Barcha chorrahalarda',
          ],
          
          [
            'id' => 'c',
            'text' => 'Faqat yomg\'irli ob-havoda',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Қувиб ўтиш қаерда тақиқланади?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Пиёдалар ўтиш жойларида ва темир йўл кесишмаларида',
          ],
          
          [
            'id' => 'b',
            'text' => 'Барча чорраҳаларда',
          ],
          
          [
            'id' => 'c',
            'text' => 'Фақат ёмғирли об-ҳавода',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Где запрещается обгон?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'На пешеходных переходах и железнодорожных переездах',
          ],
          
          [
            'id' => 'b',
            'text' => 'На всех перекрестках',
          ],
          
          [
            'id' => 'c',
            'text' => 'Только в дождливую погоду',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Quwıp ótiw qayerde qadaǵan etiledi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Piyadalar ótiw orınlarında hám temir jol kespelerinde',
          ],
          
          [
            'id' => 'b',
            'text' => 'Barlıq kóshe kesispelerinde',
          ],
          
          [
            'id' => 'c',
            'text' => 'Tek jawınlı hawa-rayında',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Avtomagistralda orqaga harakatlanishga ruxsat etiladimi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Qat\'iyan taqiqlanadi',
          ],
          
          [
            'id' => 'b',
            'text' => 'Ha, faqat chekka qatorda',
          ],
          
          [
            'id' => 'c',
            'text' => 'Ha, agar ko\'rinish yaxshi bo\'lsa',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Автомагистралда орқага ҳаракатланишга рухсат этиладими?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Қатъиян тақиқланади',
          ],
          
          [
            'id' => 'b',
            'text' => 'Ҳа, фақат чекка қаторда',
          ],
          
          [
            'id' => 'c',
            'text' => 'Ҳа, агар кўриниш яхши бўлса',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Разрешается ли движение задним ходом на автомагистрали?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Строго запрещено',
          ],
          
          [
            'id' => 'b',
            'text' => 'Да, только на обочине',
          ],
          
          [
            'id' => 'c',
            'text' => 'Да, если хорошая видимость',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Avtomagistralda artqa háreketleniwge ruxsat etiledimi?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Qatań túrde qadaǵan etiledi',
          ],
          
          [
            'id' => 'b',
            'text' => 'Awa, tek shetki qatarda',
          ],
          
          [
            'id' => 'c',
            'text' => 'Awa, eger kórinisi jaqsı bolsa',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],
  
  [
    'translations' => 
    [
      'uz_lat' => 
      [
        'question' => 'Ko\'k rangli miltillovchi mayoqchasi yoqilgan transport vositasi yaqinlashganda piyodalar qanday harakat qilishi kerak?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Qatnov qismiga chiqmasligi yoki uni darhol tark etishi kerak',
          ],
          
          [
            'id' => 'b',
            'text' => 'Harakatni davom ettirishi mumkin',
          ],
          
          [
            'id' => 'c',
            'text' => 'Transport vositasiga yo\'l berishi majburiy emas',
          ],
        ],
      ],
      'uz_cyr' => 
      [
        'question' => 'Кўк рангли милтилловчи маёқчаси ёқилган транспорт воситаси яқинлашганда пиёдалар қандай ҳаракат қилиши керак?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Қатнов қисмига чиқмаслиги ёки уни дарҳол тарк этиши керак',
          ],
          
          [
            'id' => 'b',
            'text' => 'Ҳаракатни давом эттириши мумкин',
          ],
          
          [
            'id' => 'c',
            'text' => 'Транспорт воситасига йўл бериши мажбурий эмас',
          ],
        ],
      ],
      'ru' => 
      [
        'question' => 'Как должны действовать пешеходы при приближении транспортного средства с включенным синим проблесковым маячком?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Воздержаться от перехода проезжей части или немедленно освободить ее',
          ],
          
          [
            'id' => 'b',
            'text' => 'Могут продолжать движение',
          ],
          
          [
            'id' => 'c',
            'text' => 'Не обязаны уступать дорогу транспортному средству',
          ],
        ],
      ],
      'qr' => 
      [
        'question' => 'Kók reńli jıpılaqlı mayachogi jaǵılǵan transport quralı jaqınlasqanda piyadalar qanday háreket etiwi kerek?',
        'options' => 
        [
          
          [
            'id' => 'a',
            'text' => 'Katnaw bólimine shıqpawı yamasa onı tezde tárk etiwi kerek',
          ],
          
          [
            'id' => 'b',
            'text' => 'Hareketti dawam ettiriwi múmkin',
          ],
          
          [
            'id' => 'c',
            'text' => 'Transport quralına jol beriwi májbúriy emes',
          ],
        ],
      ],
    ],
    'correct_option_id' => 'a',
    'level' => 2,
  ],

        ];

        $allQuestions = array_merge($questions, $level2Questions);

        foreach ($allQuestions as $q) {
            Question::create([
                'translations' => $q['translations'],
                'correct_option_id' => $q['correct_option_id'],
                'level' => $q['level'] ?? 1,
            ]);
        }
    }
}
