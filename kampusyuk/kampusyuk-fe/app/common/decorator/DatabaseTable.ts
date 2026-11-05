import { addOptions, Model, setModelName, TableOptions } from 'sequelize-typescript';
import voca = require('voca');

export function DatabaseTable(arg?: any){
    if (typeof arg === 'function') {
        annotate(arg);
    } else {
        const options: TableOptions = { ...arg };
        return (target: any) => {
            options.tableName=voca.camelCase(target.name);
            annotate(target, options)
        };
    }
}


function annotate(target: typeof Model, options: TableOptions = {}): void {
    setModelName(target.prototype, options.modelName || target.name);
    addOptions(target.prototype, options);
}
