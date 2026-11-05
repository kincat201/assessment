export class Comparator{
	static isEqualEitherTo(source,...target){
		const sourceType=typeof source;
		for (const testSubject of target) {
			if(typeof testSubject !== sourceType){
				return false;
			}
			if(testSubject === source){
				return true;
			}
		}
		return false;
	}
}
