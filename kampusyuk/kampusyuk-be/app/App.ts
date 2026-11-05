import { Acl, ApiVersion, Config, Env, ErrorHandler, HotReload, Jwt, SetEnv, Swagger } from '@wavecore/core-node';
import * as express from 'express';
import { useExpressServer } from '@wavecore/routing-controllers';
import * as envData from '../config/Env.json';
import * as swaggerExamples from '../config/SwaggerExamplePath.json';
import { AppendAcl } from './middleware/AppendAcl';

export class Core {
	static startServer() {
		SetEnv(envData);
		HotReload.init();
		Config.init();

		const app = express();
		const routingControllersOption = {
			cors: true,
			middlewares: [ApiVersion, Jwt, AppendAcl, Acl, ErrorHandler],
			controllers: [__dirname + '/controllers/*.js']
		};

		const bodyParser = require('body-parser');
		app.use(bodyParser.json({limit: '50mb'}));
		app.use(bodyParser.urlencoded({limit: '50mb', extended: true, parameterLimit: 50000}));

		useExpressServer(app, routingControllersOption);
		//Swagger.init(app, routingControllersOption, swaggerExamples);

		app.listen(Env().express.port, () => console.log(`Example app listening on port ${Env().express.port}!`));

	}
}
Core.startServer();
