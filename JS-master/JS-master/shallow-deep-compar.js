const typeOf = (input) => {
    const rawObject = Object.prototype.toString.call(input).toLowerCase();
    const typeOfRegex = /\[object (.*)]/g;
    const type = typeOfRegex.exec(rawObject)[1];
    return type;
};


const a = 1;
const b = 2;

if(typeOf('1') === typeOf('2')){
    console.log('yup');
}else{ 
    console.log("lol");
}

console.log("-----------------");

