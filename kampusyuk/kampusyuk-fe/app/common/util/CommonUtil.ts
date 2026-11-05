import * as bcrypt from 'bcrypt';

export function defaultValue(value,defaultReturn?){
    if(!value){
        if(!defaultReturn){
            return "";
        }
    }
    return value;
}

export function pad(n:string, width:number, z:string='0') {
    n = n + '';
    return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

export function deepClone<T>(input):T{
    const output=JSON.stringify(input);
    return JSON.parse(output);
}

export function initObject(object={},key:string[],defaultValue=""){
    key.forEach(value=>{
       object[value]=defaultValue;
    });
    return object;
}

export function generatePasswordHash(input:string){
    return bcrypt.hashSync(input, 10);
}

export function safeLength(input:any[]){
    if(!input){
        return 0;
    }
    return input.length;
}

export function safeNestedArrayPush(object:Object,key:string[],value:any){
    const objectKey=deepClone<[]>(key);
    if(key.length===1) {
        if(!object[key[0]]){
            object[key[0]]=[];
        }
        object[key[0]].push(value);
        return object;
    }
    if(!object){
        object={};
    }
    if(!object[key[0]]){
        object[key[0]] = {};
    }
    objectKey.splice(0,1);
    safeNestedArrayPush(object[key[0]],objectKey,value);
    return object;
}

export function safeNestedObject(object={}, key:string[], value:any){
    const objectKey=deepClone<[]>(key);
    if(!object){
        object={};
    }
    if(!object[key[0]]){
        object[key[0]] = {};
    }
    if(key.length===1) {
        object[key[0]] = value;
        return object;
    }
    objectKey.splice(0,1);
    safeNestedObject(object[key[0]],objectKey,value);
    return object;
}

export function getWhatChanged(source, toCheck) {
    const shouldAdd = [];
    const shouldRemove = [];

    for (const data of source) {
        const result = toCheck.find(x => x === data);
        if (!result) shouldRemove.push(data);
    }

    for (const data of toCheck) {
        const result = source.find(x => x === data);
        if (!result) shouldAdd.push(data);
    }

    return { shouldAdd, shouldRemove }
}
