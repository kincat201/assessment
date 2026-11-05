import { Comparator } from '@wavecore/core-node';
import * as moment from 'moment';

export class System {
	static customDay=null;
	static getTime(customTime?){
		if(Comparator.isExist(customTime)){
			return moment(customTime).utcOffset("+0700");
		}
		if(this.customDay){
			const customMoment=moment().set("date",this.customDay).utcOffset("+0700");
			return customMoment
		}
		return moment().utcOffset("+0700");
	}

	static getStartOfToday(customTime?){
		return this.getTime(customTime).startOf("day");
	}

	static getDate(customTime?){
		return this.getTime(customTime).format("YYYY-MM-DD");
	}
}
