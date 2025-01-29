function fibonacci(n) {
    let fibArray = [0,1];
    
    for (let i = 2; i <n; i++){
        fibArray.push(fibArray [i - 1] + fibArray [i - 2]);
    }
    return fibArray. splice (0 , n);
};
let n = 10; 
let fibonacciSequence = fibonacci(n);
console.log(fibonacciSequence);