const capsule = function(name) {
    const index = listRoute.capsules.findIndex(item => item.name.toLowerCase() === name.toLowerCase());
    if(index === -1)
    {
        throw new Error('error capsule tidak ada');
    }
    //listRoute.capsules[index].html;
    console.log(listRoute.capsules[index]);
    //document.querySelector("#sides").innerHTML = listRoute.capsules[index].html;
    return eval('(function(zz) {'+listRoute.capsules[index].js+'})(this);');
    
}