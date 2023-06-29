/* ====== Shallow copy ======  */

const myName = {
    name :  "Raj"
}

// Problem
// const yourName = myName;
// console.log(yourName);
// yourName.name = "Kishan";
// console.log(yourName);
// console.log(myName);


//  solution-1
// using  Object.assign() method
const yourName = Object.assign({}, myName);
console.log(yourName);
yourName.name = "Kishan";
console.log(yourName);
console.log(myName);


//  solution-2

// const yourName = {...myName};
// console.log(yourName);
// yourName.name = "Kishan";
// console.log(yourName);
// console.log(myName);


/* ===== Deep copy ===== */

const userDetails = {
    name :  "Raj",
    addresh: {
        city : "Keshod",
        state : "Gujarat",
    },
    /* getData: function(){
        return "All deta here!!"
    } */
}

//  solution-1
// using JSON
const userDetail =  JSON.parse(JSON.stringify(userDetails));

//  solution-2
// If you want to get the function object in deep copy the Install the Lodash library
// const userDetail = _.cloneDeep(userDetails);

userDetail.addresh.city = "Avaniya";

console.log("First user city name",userDetails.addresh.city);
console.log("Second user city name",userDetail.addresh.city);