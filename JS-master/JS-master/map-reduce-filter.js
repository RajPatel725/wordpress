// Higher Order Function 

// forEach
// filter 
// map
// sort
// reduce

const companies = [
    { name: "Google", category: "Product Based", start: 1981, end: 2004 },
    { name: "Amazon", category: "Product Based", start: 1992, end: 2008 },
    { name: "Paytm", category: "Product Based", start: 1999, end: 2007 },
    { name: "Coforge", category: "Service Based", start: 1989, end: 2010 },
    { name: "Mindtree", category: "Service Based", start: 1989, end: 2010 },
];

const ages = [33, 12, 20, 34, 36, 15, 25, 4, 16, 88, 99, 64, 32];

// 1. forEach loops

// for (let i = 0; i <= companies.length; i++) {
//     console.log(companies[i].name);
// }

// companies.forEach(function(company) {
//     console.log(company.name);
// });

// companies.forEach((company)=>{
//     console.log(company.name);
// });

// companies.forEach((company)=>(console.log(company.name)));

// 2. Filter

// for (i = 0; i < ages.length; i++) {
//     if(ages[i] >=20){
//         console.log(ages[i]);
//     }
// }

// ages.filter(function(age){
//     if(age >= 20){
//         console.log(age);
//     }
// });

// ages.filter((age) => {
//     if (age >= 20) {
//         console.log(age);
//     }
// });

// const age = ages.filter((age) => (age > 30));
// console.log(age);

// const companyCat = companies.filter(company => company.category === "Service Based");
// console.log(companyCat);

// 3. Map

// companies.map(function (company) {
//     console.log(company.name);
// });

// companies.map((company)=>{
//     console.log(company.name);
// });

// 4. Sort

// const sorted = companies.sort(function(company1, company2){
//     if(company1.start < company2.start){
//         return 1;
//     }else{
//         return -1;
//     }
// })
// console.log(sorted);

// const sorted = companies.sort((c1, c2) => (c1.start < c2.start ? 1 : -1) );
// console.log(sorted);

// const sortedAge = ages.sort((a1, a2) => (a1 - a2));
// console.log(sortedAge);


// 5. Reduce

// let total = 0;

// for (let i = 0; i < ages.length; i++) {
//     total += ages[i];
// }
// console.log(total);

// const totalAge = ages.reduce(function(total,age){
//     return total+age
// }, 0)
// console.log(totalAge);

const totalAge = ages.reduce((totle, age) => totle + age, 0);
console.log(totalAge);