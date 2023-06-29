// const arra = new Set([1,2,3]);

// arra.add(4)
// arra.add(5)

// const ID = arra;
// console.log(ID);

const data = ['a','9','c','6','e'];
const [,,,raj] = data;
const [,kiran] = data;
console.log(raj,kiran);

const user = {name: 'Raj', age: '23', skill: 'JS'};
/* How to get name property without . operator */
// Simple 
console.log(user.name);
// Using object {}
const {age} = user;
console.log(age);