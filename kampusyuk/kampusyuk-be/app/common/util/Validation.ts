import * as envData from '../../../config/Env.json';
import * as moment from 'moment';

export function validate( field , required = []) {
	const condition = {};
	const result = { status : true, message : 'valid payload'}

	if(!field) {result.status = false; result.message = 'field not found'};
	Object.keys(field)
		.forEach(function eachKey(key) {
			if(result.status){
				if(required.indexOf(key) !== -1){
					if(!field[key] && field[key] !== 0){
						result.status = false;
						result.message = key + ' is required';
					}
				}
			}
		});
	return result;
}

export function validateInput(input, validation) {
	for(const key in validation) {
		if(typeof input[key] === 'undefined') {
			return {
				status: false,
				message: key + ' is required'
			}
		} else if(validation[key] instanceof Array) {
			const type = validation[key][0];
			if(input[key] instanceof Array !== true) {
				return {
					status: false,
					message: key + ' must be array of ' + type + ' only'
				};
			}
			if(!input[key].every((value) => { return typeof value === type })) {
				return {
					status: false,
					message: key + ' must be array of ' + type + ' only'
				};
			}
		} else if(typeof input[key] !== validation[key] && (validation[key] === 'date' && moment(input[key]).isValid() === false)) {
			return {
				status: false,
				message: key + ' must be ' + validation[key]
			}
		}
	}
	return { status: true };
}

export function checkAllowedFilter( input , allowedFilter = []) {
	let status = true;
	if(!input || !input.filter) return true;
	Object.keys(input.filter).forEach(function eachKey(key) {
		if(allowedFilter.indexOf(key) === -1) status = false;
	});
	return status;
}

export function checkAllowedOrder( input , allowedOrder = []) {
	let status = true;
	if(!input || !input.orderBy) return true;
	Object.keys(input.orderBy).forEach(function eachKey(key) {
		if(allowedOrder.indexOf(key) === -1) status = false;
	});
	return status;
}

export function checkPayload( input , allowedFilter = [], allowedOrder = []) {
	const response = { status : false, message : "invalid payload" };

	if(!checkAllowedFilter(input, allowedFilter)){
		response.message = 'Invalid filter payload, allowed filter is ('+ allowedFilter.join(', ') +')';
		return response;
	}

	if(!checkAllowedOrder(input, allowedOrder)){
		response.message = 'Invalid order payload, allowed order is ('+ allowedOrder.join(', ') +')';
		return response;
	}

	response.status = true;

	return response
}

export function validEmail(email) {
	const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}

export function validExtension(extension){
	if(!extension) return false;
	const ext = extension.ext;
	if( (ext !== 'jpg' ) && (ext !== 'png') && (ext !== 'jpeg') && (ext !== 'pdf') ) return false;
	return true;
}

export function isProd(){
	return envData.environment === 'staging' ? false : true;
}
