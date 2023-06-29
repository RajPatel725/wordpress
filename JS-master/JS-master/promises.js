// Async JS Programming
// callback, Promises, Async & Await

//1. Problem statment
const user = [
  { name: "KK Dada", age: 26 },
  { name: "Hemant Bhai", age: 28 },
];

function getUset() {
  setTimeout(() => {
    let output = "";
    user.forEach((use) => {
      output += `${use.name}`;
    });
    console.log(output);
  }, 1000);
}

//2. Call-Back

// function newData(callback) {
//   setTimeout(() => {
//     let myName = { name: "Raju", age: 23 };
//     user.push(myName);
//     callback();
//   }, 3000);
// }
// newData(getUset);

//3. Promises

// function newData() {
//   return new Promise((resolve, reject) => {
//     setTimeout(() => {
//       let myName = { name: "Raju", age: 23 };
//       user.push(myName);
//       let error = false;

//       if(!error){
//         resolve();
//       }else{
//         reject("Kuch sahi nhi..");
//       }
//     }, 3000);
//   });
// }

// newData()
//   .then(getUset)
//   .catch((err) => console.log(err));

//4. Async Await.

function newData() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      let myName = { name: "Raju", age: 23 };
      user.push(myName);
      let error = false;

      if (!error) {
        resolve();
      } else {
        reject("Kuch sahi nhi..");
      }
    }, 3000);
  });
}
async function start() {
  await newData();
  getUset();
}
start();