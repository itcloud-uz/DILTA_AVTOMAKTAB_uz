import express from 'express';
import cors from 'cors';
import fs from 'fs';
import path from 'path';
import initSqlJs from 'sql.js';

const app = express();
app.use(cors());
app.use(express.json());

// Serve static assets from public/build
app.use('/build', express.static('./public/build'));

// Serve home page
app.get('/', (req, res) => {
    const filePath = path.resolve('./resources/views/welcome.blade.php');
    res.type('html');
    res.sendFile(filePath);
});

// Setup sql.js database
let db;
initSqlJs.default().then(SQL => {
    const filebuffer = fs.readFileSync('./database/database.sqlite');
    db = new SQL.Database(filebuffer);
    console.log("SQLite database loaded successfully via WebAssembly!");
}).catch(err => {
    console.error("Failed to load SQLite database:", err);
});

// Deterministic PRNG and Question Generator
function generateDynamicQuestion(seed, level, qIndex) {
    const randVal = (Math.imul(seed, 1103515245) + 12345) & 0x7fffffff;
    const type = randVal % 6;
    const id = 100000 + seed;
    const correctOption = 'a';
    let translations = {};

    if (type === 0) {
        const vehicles = [
            { name_uz: 'yengil avtomobillar', name_en: 'passenger cars', name_ru: 'легковым автомобилям', name_qr: 'jeńil avtomobiller', name_cyr: 'енгил автомобиллар' },
            { name_uz: 'mototsikllar', name_en: 'motorcycles', name_ru: 'мотоциклам', name_qr: 'mototsikller', name_cyr: 'мотоцикллар' },
            { name_uz: 'avtobuslar', name_en: 'buses', name_ru: 'автобусам', name_qr: 'avtobuslar', name_cyr: 'автобуслар' },
            { name_uz: 'yuk avtomobillari (3.5 tonnadan ortiq)', name_en: 'trucks (over 3.5 tons)', name_ru: 'грузовым автомобилям (более 3.5 тонн)', name_qr: 'yuk avtomobilleri (3.5 tonnadan artıq)', name_cyr: 'юк автомобиллари (3.5 тоннадан ортиқ)' }
        ];
        const vIdx = Math.floor(randVal / 4) % vehicles.length;
        const v = vehicles[vIdx];

        const roads = [
            { name_uz: 'aholi punktlarida', name_en: 'in populated areas', name_ru: 'в населенных пунктах', name_qr: 'aholı punktlerinde', name_cyr: 'аҳоли punktlarida', speed: 60 },
            { name_uz: 'avtomagistrallarda', name_en: 'on motorways', name_ru: 'на автомагистралях', name_qr: 'avtomagistrallarda', name_cyr: 'автомагистралларда', speed: 100 },
            { name_uz: 'aholi punktlaridan tashqarida', name_en: 'outside populated areas', name_ru: 'вне населенных пунктов', name_qr: 'aholı punktlerinen tısqarıda', name_cyr: 'аҳоли punktlaridan tashqarida', speed: 90 }
        ];
        const rIdx = Math.floor(randVal / 16) % roads.length;
        const r = roads[rIdx];

        let speedLimit = r.speed;
        if (vIdx > 0 && speedLimit === 100) {
            speedLimit = 90;
        }
        if (vIdx === 1 && speedLimit === 60) {
            speedLimit = 60;
        }

        const q_uz = `Ushbu holatda: ${r.name_uz} ${v.name_uz}ning maksimal ruxsat etilgan tezligi soatiga necha km?`;
        const q_cyr = `Ушбу ҳолатда: ${r.name_cyr} ${v.name_cyr}нинг максимал рухсат этилган тезлиги соатига неча км?`;
        const q_en = `In this situation: what is the maximum speed limit for ${v.name_en} ${r.name_en}?`;
        const q_ru = `В данной ситуации: какая максимальная скорость разрешена ${v.name_ru} ${r.name_ru}?`;
        const q_qr = `Usı jaǵdayda: ${r.name_qr} ${v.name_qr}niń maksimal ruxsat etilgen tezligi saatına neshe km?`;

        const opt_correct = speedLimit;
        const opt_wrong1 = speedLimit - 20;
        const opt_wrong2 = speedLimit + 10;

        translations = {
            uz_lat: {
                question: q_uz,
                options: [
                    { id: 'a', text: `${opt_correct} km/s dan oshmasligi kerak` },
                    { id: 'b', text: `${opt_wrong1} km/s dan oshmasligi kerak` },
                    { id: 'c', text: `${opt_wrong2} km/s dan oshmasligi kerak` }
                ]
            },
            uz_cyr: {
                question: q_cyr,
                options: [
                    { id: 'a', text: `${opt_correct} км/с дан ошмаслиги керак` },
                    { id: 'b', text: `${opt_wrong1} км/с дан ошмаслиги керак` },
                    { id: 'c', text: `${opt_wrong2} км/с дан ошмаслиги керак` }
                ]
            },
            en: {
                question: q_en,
                options: [
                    { id: 'a', text: `No more than ${opt_correct} km/h` },
                    { id: 'b', text: `No more than ${opt_wrong1} km/h` },
                    { id: 'c', text: `No more than ${opt_wrong2} km/h` }
                ]
            },
            ru: {
                question: q_ru,
                options: [
                    { id: 'a', text: `Не более ${opt_correct} км/ч` },
                    { id: 'b', text: `Не более ${opt_wrong1} км/ч` },
                    { id: 'c', text: `Не более ${opt_wrong2} км/ч` }
                ]
            },
            qr: {
                question: q_qr,
                options: [
                    { id: 'a', text: `${opt_correct} km/s dan aspawı kerek` },
                    { id: 'b', text: `${opt_wrong1} km/s dan aspawı kerek` },
                    { id: 'c', text: `${opt_wrong2} km/s dan aspawı kerek` }
                ]
            }
        };
    } else if (type === 1) {
        const categories = [
            { cat: 'A', age: 16, desc_uz: 'mototsikllarni', desc_en: 'motorcycles (category A)', desc_ru: 'мотоциклами (категория A)', desc_qr: 'mototsikllerdi', desc_cyr: 'мотоциклларни' },
            { cat: 'B', age: 18, desc_uz: 'yengil avtomobillarni', desc_en: 'cars (category B)', desc_ru: 'легковыми автомобилями (категория B)', desc_qr: 'jeńil avtomobillerdi', desc_cyr: 'енгил автомобилларни' },
            { cat: 'C', age: 18, desc_uz: 'yuk avtomobillarini', desc_en: 'trucks (category C)', desc_ru: 'грузовыми автомобилями (категория C)', desc_qr: 'yuk avtomobillerdi', desc_cyr: 'юк автомобилларини' },
            { cat: 'D', age: 21, desc_uz: 'avtobuslarni', desc_en: 'buses (category D)', desc_ru: 'автобусами (категория D)', desc_qr: 'avtobuslardı', desc_cyr: 'автобусларни' }
        ];
        const cIdx = Math.floor(randVal / 8) % categories.length;
        const c = categories[cIdx];

        const q_uz = `Fuqarolar necha yoshdan boshlab ${c.desc_uz} boshqarish huquqiga ega bo'ladilar?`;
        const q_cyr = `Фуқаролар неча ёшдан бошлаб ${c.desc_cyr} boshqarish huquqiga ega bo'ladilar?`;
        const q_en = `From what age are citizens allowed to drive ${c.desc_en}?`;
        const q_ru = `С какого возраста гражданам разрешается управлять ${c.desc_ru}?`;
        const q_qr = `Puqaralar neshe jasınan baslap ${c.desc_qr} basqarıw huqıqına iye boladı?`;

        const age_correct = c.age;
        const age_wrong1 = age_correct - 2;
        const age_wrong2 = age_correct + 2;

        translations = {
            uz_lat: {
                question: q_uz,
                options: [
                    { id: 'a', text: `${age_correct} yoshdan` },
                    { id: 'b', text: `${age_wrong1} yoshdan` },
                    { id: 'c', text: `${age_wrong2} yoshdan` }
                ]
            },
            uz_cyr: {
                question: q_cyr,
                options: [
                    { id: 'a', text: `${age_correct} ёшдан` },
                    { id: 'b', text: `${age_wrong1} ёшдан` },
                    { id: 'c', text: `${age_wrong2} ёшdan` }
                ]
            },
            en: {
                question: q_en,
                options: [
                    { id: 'a', text: `From ${age_correct} years old` },
                    { id: 'b', text: `From ${age_wrong1} years old` },
                    { id: 'c', text: `From ${age_wrong2} years old` }
                ]
            },
            ru: {
                question: q_ru,
                options: [
                    { id: 'a', text: `С ${age_correct} лет` },
                    { id: 'b', text: `С ${age_wrong1} лет` },
                    { id: 'c', text: `С ${age_wrong2} лет` }
                ]
            },
            qr: {
                question: q_qr,
                options: [
                    { id: 'a', text: `${age_correct} jasınan` },
                    { id: 'b', text: `${age_wrong1} jasınan` },
                    { id: 'c', text: `${age_wrong2} jasınan` }
                ]
            }
        };
    } else if (type === 2) {
        const scenarios = [
            { dist: 5, desc_uz: "piyodalar o'tish joyidan kamida necha metr oldin", desc_en: 'at least how many meters before a pedestrian crossing', desc_ru: 'не менее скольких метров перед пешеходным переходом', desc_qr: 'piyodalar ótiw jayınan keminde neshe metr aldın', desc_cyr: 'пиёдалар ўтиш жойидан камида неча метр олдин' },
            { dist: 15, desc_uz: "avtobus bekatidan kamida necha metr masofada", desc_en: 'at least how many meters from a bus stop', desc_ru: 'не менее скольких метров от автобусной остановки', desc_qr: 'avtobus bekatınan keminde neshe metr aralıqta', desc_cyr: 'автобус бекатидан камида неча метр масофада' },
            { dist: 50, desc_uz: "temir yo'l kesishmasidan kamida necha metr masofada to'xtash taqiqlanadi", desc_en: 'at least how many meters from a railway crossing stopping is prohibited', desc_ru: 'не ближе скольких метров от железнодорожного переезда запрещена остановка', desc_qr: 'temir jol kesilmesinen keminde neshe metr aralıqta toqtaw qadaǵan etiledi', desc_cyr: 'темир йўл кесишмасидан камида неча метр масофада тўхташ тақиқланади' }
        ];
        const sIdx = Math.floor(randVal / 16) % scenarios.length;
        const s = scenarios[sIdx];

        const q_uz = `Transport vositasini to'xtatish ${s.desc_uz} ruxsat etiladi?`;
        const q_cyr = `Транспорт воситасини тўхтатиш ${s.desc_cyr} рухсат etiladi?`;
        const q_en = `Is it allowed to stop a vehicle ${s.desc_en}?`;
        const q_ru = `Разрешается ли останавливать транспортное средство ${s.desc_ru}?`;
        const q_qr = `Transport quralın toqtatıw ${s.desc_qr} ruxsat etiledi?`;

        const d_correct = s.dist;
        const d_wrong1 = d_correct + 5;
        const d_wrong2 = d_correct + 10;

        translations = {
            uz_lat: {
                question: q_uz,
                options: [
                    { id: 'a', text: `Kamida ${d_correct} metr bo'lganda ruxsat beriladi` },
                    { id: 'b', text: `Kamida ${d_wrong1} metr bo'lganda ruxsat beriladi` },
                    { id: 'c', text: `Kamida ${d_wrong2} metr bo'lganda ruxsat beriladi` }
                ]
            },
            uz_cyr: {
                question: q_cyr,
                options: [
                    { id: 'a', text: `Камида ${d_correct} метр бўлганда рухсат берилади` },
                    { id: 'b', text: `Камида ${d_wrong1} метр бўлганда рухсат берилади` },
                    { id: 'c', text: `Камида ${d_wrong2} метр бўлганда рухсат берилади` }
                ]
            },
            en: {
                question: q_en,
                options: [
                    { id: 'a', text: `Allowed at at least ${d_correct} meters` },
                    { id: 'b', text: `Allowed at at least ${d_wrong1} meters` },
                    { id: 'c', text: `Allowed at at least ${d_wrong2} meters` }
                ]
            },
            ru: {
                question: q_ru,
                options: [
                    { id: 'a', text: `Разрешается не менее ${d_correct} метров` },
                    { id: 'b', text: `Разрешается не менее ${d_wrong1} метров` },
                    { id: 'c', text: `Разрешается не менее ${d_wrong2} метров` }
                ]
            },
            qr: {
                question: q_qr,
                options: [
                    { id: 'a', text: `Keminde ${d_correct} metr bolǵanda ruxsat beriledi` },
                    { id: 'b', text: `Keminde ${d_wrong1} metr bolǵanda ruxsat beriledi` },
                    { id: 'c', text: `Keminde ${d_wrong2} metr bolǵanda ruxsat beriledi` }
                ]
            }
        };
    } else if (type === 3) {
        const violations = [
            { fine: 1, desc_uz: "xavfsizlik kamarini taqmaslik", desc_en: 'not wearing a seat belt', desc_ru: 'непристегнутый ремень безопасности', desc_qr: 'qawipsizlik kemerin taqpaw', desc_cyr: 'хавфсизлик камарини тақмаслик' },
            { fine: 2, desc_uz: "svetoforning taqiqlovchi ishorasiga bo'ysunmaslik", desc_en: 'disobeying a traffic light signal', desc_ru: 'проезд на запрещающий сигнал светофора', desc_qr: 'svetofordıń qadaǵalawshı belgisiniń boysunpaw', desc_cyr: 'светофорнинг тақиқловчи ишорасига бўйсунмаслик' },
            { fine: 3, desc_uz: "telefondan foydalanish qoidalarini buzish", desc_en: 'violating phone usage rules while driving', desc_ru: 'нарушение правил пользования телефоном за рулем', desc_qr: 'telefondan paydalanıw qaǵıydaların buzıw', desc_cyr: 'телефондан фойдаланиш қоидаларини бузиш' }
        ];
        const vIdx = Math.floor(randVal / 8) % violations.length;
        const v = violations[vIdx];

        const q_uz = `Haydovchi tomonidan ${v.desc_uz} holati uchun qancha jarima solinadi?`;
        const q_cyr = `Ҳайдовчи томонидан ${v.desc_cyr} ҳолати учун қанча жарима солинади?`;
        const q_en = `What is the penalty for ${v.desc_en} by the driver?`;
        const q_ru = `Какой штраф налагается за ${v.desc_ru} водителем?`;
        const q_qr = `Haydawshı tárepinen ${v.desc_qr} jaǵdayı ushın qansha jarıma salınadı?`;

        const f_correct = v.fine;
        const f_wrong1 = f_correct + 1;
        const f_wrong2 = f_correct + 3;

        translations = {
            uz_lat: {
                question: q_uz,
                options: [
                    { id: 'a', text: `BHMning ${f_correct} baravari miqdorida` },
                    { id: 'b', text: `BHMning ${f_wrong1} baravari miqdorida` },
                    { id: 'c', text: `BHMning ${f_wrong2} baravari miqdorida` }
                ]
            },
            uz_cyr: {
                question: q_cyr,
                options: [
                    { id: 'a', text: `БҲМning ${f_correct} baravari miqdorida` },
                    { id: 'b', text: `БҲМning ${f_wrong1} baravari miqdorida` },
                    { id: 'c', text: `БҲМning ${f_wrong2} baravari miqdorida` }
                ]
            },
            en: {
                question: q_en,
                options: [
                    { id: 'a', text: `${f_correct} times the BCA (Base Calculating Amount)` },
                    { id: 'b', text: `${f_wrong1} times the BCA` },
                    { id: 'c', text: `${f_wrong2} times the BCA` }
                ]
            },
            ru: {
                question: q_ru,
                options: [
                    { id: 'a', text: `В размере ${f_correct} БРВ (базовой расчетной величины)` },
                    { id: 'b', text: `В размере ${f_wrong1} БРВ` },
                    { id: 'c', text: `В размере ${f_wrong2} БРВ` }
                ]
            },
            qr: {
                question: q_qr,
                options: [
                    { id: 'a', text: `BHMniń ${f_correct} esesi muǵdarında` },
                    { id: 'b', text: `BHMniń ${f_wrong1} esesi muǵdarında` },
                    { id: 'c', text: `BHMniń ${f_wrong2} esesi muǵdarında` }
                ]
            }
        };
    } else if (type === 4) {
        const scenarios = [
            { desc_uz: "Chorrahada teng ahamiyatli bo'lmagan yo'llar kesishganda, kim birinchi o'tadi?", desc_en: 'When crossing non-equivalent roads at an intersection, who goes first?', desc_ru: 'При пересечении неравнозначных дорог на перекрестке кто имеет преимущество?', desc_qr: 'Kesiliskede teń áhmiyetli bolmaǵan jollar kesilskende, kim birinshi ótedi?', desc_cyr: "Чорраҳада тенг аҳамиятли бўлмаган йўллар кесишганда, ким birinshi o'tadi?" },
            { desc_uz: "Teng ahamiyatli chorrahada, qaysi transport vositasi yo'l berishi kerak?", desc_en: 'At an equivalent intersection, which vehicle must yield?', desc_ru: 'На равнозначном перекрестке какое транспортное средство должно уступить дорогу?', desc_qr: 'Teń áhmiyetli kesiliskede, qaysı transport quralı jol beriwi kerek?', desc_cyr: "Тенг аҳамиятли чорраҳада, қайси транспорт воситаси йўл бериши керак?" }
        ];
        const sIdx = Math.floor(randVal / 16) % scenarios.length;
        const s = scenarios[sIdx];

        if (sIdx === 0) {
            translations = {
                uz_lat: {
                    question: s.desc_uz,
                    options: [
                        { id: 'a', text: "Bosh yo'ldan kelayotgan transport vositasi" },
                        { id: 'b', text: "Ikkinchi darajali yo'ldagi transport vositasi" },
                        { id: 'c', text: "Katta transport vositasi (masalan, yuk mashinasi)" }
                    ]
                },
                uz_cyr: {
                    question: s.desc_cyr,
                    options: [
                        { id: 'a', text: "Бош йўлdan kelayotgan transport vositasi" },
                        { id: 'b', text: "Иккинчи даражали йўлдаги транспорт воситаси" },
                        { id: 'c', text: "Катта транспорт воситаси (масалан, юк машинаси)" }
                    ]
                },
                en: {
                    question: s.desc_en,
                    options: [
                        { id: 'a', text: "The vehicle approaching from the main road" },
                        { id: 'b', text: "The vehicle on the secondary road" },
                        { id: 'c', text: "The larger vehicle (e.g. truck)" }
                    ]
                },
                ru: {
                    question: s.desc_ru,
                    options: [
                        { id: 'a', text: "Транспортное средство, движущееся по главной дороге" },
                        { id: 'b', text: "Транспортное средство на второстепенной дороге" },
                        { id: 'c', text: "Крупное транспортное средство (например, грузовик)" }
                    ]
                },
                qr: {
                    question: s.desc_qr,
                    options: [
                        { id: 'a', text: "Bas joldan keletuǵın transport quralı" },
                        { id: 'b', text: "Ekinshi dárejeli joldaǵı transport quralı" },
                        { id: 'c', text: "Úlken transport quralı (mısalı, yuk mashinasi)" }
                    ]
                }
            };
        } else {
            translations = {
                uz_lat: {
                    question: s.desc_uz,
                    options: [
                        { id: 'a', text: "O'ng tomondan kelayotgan (o'ng qo'l qoidasi) transport vositasiga yo'l beriladi" },
                        { id: 'b', text: "Chap tomondan kelayotgan transport vositasiga yo'l beriladi" },
                        { id: 'c', text: "Kattaroq transport vositasiga yo'l beriladi" }
                    ]
                },
                uz_cyr: {
                    question: s.desc_cyr,
                    options: [
                        { id: 'a', text: "Ўнг томондан келаётган (ўнг қўл қоидаси) транспорт воситасига йўл берилади" },
                        { id: 'b', text: "Чап томондан келаётган транспорт воситасига йўл берилади" },
                        { id: 'c', text: "Каттароқ транспорт воситасига йўл берилади" }
                    ]
                },
                en: {
                    question: s.desc_en,
                    options: [
                        { id: 'a', text: "Yield to the vehicle approaching from the right (right-hand rule)" },
                        { id: 'b', text: "Yield to the vehicle approaching from the left" },
                        { id: 'c', text: "Yield to the larger vehicle" }
                    ]
                },
                ru: {
                    question: s.desc_ru,
                    options: [
                        { id: 'a', text: "Уступить транспортному средству, приближающемуся справа (правило помехи справа)" },
                        { id: 'b', text: "Уступить транспортному средству, приближающемуся слева" },
                        { id: 'c', text: "Уступить более крупному транспортному средству" }
                    ]
                },
                qr: {
                    question: s.desc_qr,
                    options: [
                        { id: 'a', text: "Oń tárepten keletuǵın (oń qol qaǵıydası) transport quralına jol beriledi" },
                        { id: 'b', text: "Shep tárepten keletuǵın transport quralına jol beriledi" },
                        { id: 'c', text: "Úlkenirek transport quralına jol beriledi" }
                    ]
                }
            };
        }
    } else {
        const techs = [
            { limit: '1.6 mm', desc_uz: "yengil avtomobillarning shinalari protektori naqshining balandligi kamida necha mm bo'lishi kerak?", desc_en: 'what is the minimum tire tread depth for passenger cars?', desc_ru: 'какова минимальная высота рисунка протектора шин легковых автомобилей?', desc_qr: 'jeńil avtomobillerdiń shinaları protektorı naǵısınıń biyikligi keminde neshe mm bolıwı kerek?', desc_cyr: "енгил автомобилларнинг шиналари протектори нақшининг баландлиги камида неча мм бўлиши керак?" },
            { limit: '0.8 mm', desc_uz: "mototsikllarning shinalari protektori naqshining balandligi kamida necha mm bo'lishi kerak?", desc_en: 'what is the minimum tire tread depth for motorcycles?', desc_ru: 'какова минимальная высота рисунка протектора шин мотоциклов?', desc_qr: 'mototsikllerdiń shinaları protektorı naǵısınıń biyikligi keminde neshe mm bolıwı kerek?', desc_cyr: "мотоциклларнинг шиналари протектори нақшининг баландлиги камида неча мм бўлиши керак?" }
        ];
        const tIdx = Math.floor(randVal / 16) % techs.length;
        const t = techs[tIdx];

        const q_uz = `Texnik qoidalarga ko'ra, ${t.desc_uz}`;
        const q_cyr = `Техник қоидаларга кўра, ${t.desc_cyr}`;
        const q_en = `According to technical regulations, ${t.desc_en}`;
        const q_ru = `Согласно техническим регламентам, ${t.desc_ru}`;
        const q_qr = `Texnik qaǵıydalarǵa kóre, ${t.desc_qr}`;

        const t_correct = t.limit;
        const t_wrong1 = (tIdx === 0) ? '1.0 mm' : '0.5 mm';
        const t_wrong2 = (tIdx === 0) ? '2.0 mm' : '1.2 mm';

        translations = {
            uz_lat: {
                question: q_uz,
                options: [
                    { id: 'a', text: `Kamida ${t_correct}` },
                    { id: 'b', text: `Kamida ${t_wrong1}` },
                    { id: 'c', text: `Kamida ${t_wrong2}` }
                ]
            },
            uz_cyr: {
                question: q_cyr,
                options: [
                    { id: 'a', text: `Камида ${t_correct}` },
                    { id: 'b', text: `Камида ${t_wrong1}` },
                    { id: 'c', text: `Камида ${t_wrong2}` }
                ]
            },
            en: {
                question: q_en,
                options: [
                    { id: 'a', text: `At least ${t_correct}` },
                    { id: 'b', text: `At least ${t_wrong1}` },
                    { id: 'c', text: `At least ${t_wrong2}` }
                ]
            },
            ru: {
                question: q_ru,
                options: [
                    { id: 'a', text: `Не менее ${t_correct}` },
                    { id: 'b', text: `Не менее ${t_wrong1}` },
                    { id: 'c', text: `Не менее ${t_wrong2}` }
                ]
            },
            qr: {
                question: q_qr,
                options: [
                    { id: 'a', text: `Keminde ${t_correct}` },
                    { id: 'b', text: `Keminde ${t_wrong1}` },
                    { id: 'c', text: `Keminde ${t_wrong2}` }
                ]
            }
        };
    }

    return {
        id,
        translations,
        correct_option_id: correctOption,
        level
    };
}

// Get Questions Route
app.get('/api/v1/questions', (req, res) => {
    try {
        const level = parseInt(req.query.level || '1', 10);
        
        // Fetch questions from DB
        const stmt = db.prepare("SELECT * FROM questions WHERE level = :lvl");
        const rows = [];
        stmt.bind({ ':lvl': level });
        while (stmt.step()) {
            const row = stmt.getAsObject();
            rows.push({
                id: row.id,
                translations: JSON.parse(row.translations),
                correct_option_id: row.correct_option_id,
                level: row.level
            });
        }
        stmt.free();

        // Select up to 10 random DB questions
        const dbQuestions = [];
        const copyRows = [...rows];
        while (dbQuestions.length < 10 && copyRows.length > 0) {
            const idx = Math.floor(Math.random() * copyRows.length);
            dbQuestions.push(copyRows.splice(idx, 1)[0]);
        }

        const questions = [...dbQuestions];

        // Fill remaining with dynamic questions
        while (questions.length < 20) {
            const seed = Math.floor(Math.random() * 90000) + 10000;
            const generated = generateDynamicQuestion(seed, level, questions.length + 1);
            if (!questions.some(q => q.id === generated.id)) {
                questions.push(generated);
            }
        }

        res.json({ data: questions });
    } catch (e) {
        console.error("API Fetch Error:", e);
        res.status(500).json({ error: "Server failed to load questions" });
    }
});

// Fallback all static assets
app.use(express.static('./public'));

const PORT = 8000;
app.listen(PORT, '0.0.0.0', () => {
    console.log(`===================================================`);
    console.log(`  DELTA_AVTOMAKTAB_UZ Server Running on Port ${PORT}`);
    console.log(`  Address: http://127.0.0.1:${PORT}`);
    console.log(`===================================================`);
});
