let date 
setInterval(() => {
    date =new Date();
    document.querySelector('#header').innerHTML =
    '${date?.getHours()}:{date?.getMinutes()}:${date?.getSeconds))}'
    < 10 ?
    '0{date?.getSeconds()}' : date?.getSeconds()}
} , 1000)  
