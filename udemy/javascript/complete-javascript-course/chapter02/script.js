let js = "amazing";
// if (js === 'amazing') alert('JavaScript is Fun!');

console.log(40 + 8 + 23 - 10);
console.log("Jonas");
console.log(23);

// EP: 10
// let firstName = "Jonas";
// let $age = 27;

// let PI = "3.1415";

// let myFirstJob = "Programmer";
// let myCurrentJob = "Teacher";

// console.log(firstName);
// let 3years = 2;

// EP: 12
let javascriptIsFun = true;
console.log(javascriptIsFun);

// console.log(typeof true);
console.log(typeof javascriptIsFun);
// console.log(typeof 23);
// console.log(typeof 'Jonas');


javascriptIsFun = 'Yes';
console.log(typeof javascriptIsFun);

// Undifined
let year;
console.log(year);
console.log(typeof year);

year = 2037;
console.log(year);
console.log(typeof year);

console.log(typeof null);

// ep: 13
let age = 30;
age = 31;

// good
const birthYear = 1991;

// not good
// birthYear = 1990;
// const job;
var job = 'Programmer';
job = 'teacher';

// ep: 14
// math operators
const now = 2037;
const ageJonas = now - 1991;
const ageSarah = now - 2018;
console.log(ageJonas, ageSarah);
console.log(ageJonas * 2, ageJonas / 10, 2 ** 3);

const firstName = 'Jpnas';
const lastName = 'Schmcdtmann';
console.log(firstName + ' ' + lastName);

// Assigment operators
let x = 10 + 5;
x += 10;
x *= 4;
x ++;
x --;
x --;
console.log(x);

// Comarison operators
console.log(ageJonas > ageSarah);
console.log(ageSarah >=18);
const isFullAge = ageSarah >= 18;
console.log(isFullAge);

// ep: 15
let y;
x = y = 25 - 10 - 5;
console.log(x, y);

const averageAge = (ageJonas + ageSarah) / 2;
console.log(ageJonas, ageSarah, averageAge);

// ep: 16
massJohn = 92;
hightJohn = 1.95;
massMarks = 78;
hightMarks = 1.69;

bmiJohn = massJohn / (hightJohn ** 2);
bmiMarks = massMarks / (hightMarks ** 2);

marksHigherBMI = bmiMarks > bmiJohn;
console.log(marksHigherBMI);

// ep: 17
const jonas = "I'm " + firstName + ', a ' + (year - birthYear) + ' years old ' + job + '!';
const jonasNew = `I'm ${firstName}, a ${year - birthYear} year old ${job}!`;
console.log(jonas);
console.log(jonasNew);

console.log(`Just a ragular string...`);
console.log('String with \n\
multiple \n\
lines');
console.log(`String
multiple
lines`);

// ep: 18
age = 15;
const isOldEnough = age >= 18;

if (isOldEnough) {
    console.log('Sarah can start driving license')
} else {
    const yearsLeft = 18 - age;
    console.log(`Sarah is too young. Wait another ${yearsLeft} yeas: :)`);
}

// ep: 19
if (bmiMarks > bmiJohn) {
    console.log(`Mark's BMI (${bmiMarks}) is higher than John's (${bmiJohn})!` );
} else {
    console.log(`John's BMI (${bmiJohn}) is higher than Mark's (${bmiMarks})!` );
}

// ep: 20
const inputYear = '1991';
console.log(Number(inputYear), inputYear);
console.log(Number(inputYear) + 10);

console.log(Number('Jonas'));
console.log(typeof NaN);
console.log(String(23), 23);

console.log("I'm " + 23 + " years old");
console.log("I'm " + String(23) + " years old");
console.log('23' - '10' - 3);
let n = "1" + 1;
n = n - 1;
console.log(n);
n = 2 + 3 + 4 + "5";
console.log(n);

// ep: 21
console.log(Boolean(0));
console.log(Boolean(undefined));
console.log(Boolean('Jonas'));
console.log(Boolean(NaN));
console.log(Boolean({}));
console.log(Boolean(''));

let money = 0;
if (money) {
    console.log("Don't spend it all ;()");
}else {
    console.log('You should get a job');
}

money = 10;
if (money) {
    console.log("Don't spend it all ;()");
}else {
    console.log('You should get a job');
}

// ep: 22
age = '18';
if (age === 18) console.log('You just became an adult :D (strict)');
if (age == 18) console.log('You just became an adult :D (loose)');

const favorite = Number(prompt("What's your favorite number?"));
console.log(favorite);
console.log(typeof favorite);

if (favorite === 23) {
    console.log('Cool! 23 is an amazing number!');
} else if (favorite === 7) {
    console.log('7 is also a cool number');
} else {
    console.log('Number is not 23 and 7');
}

if (favorite !== 23) console.log("why not 23?");
