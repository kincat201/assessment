Injectable outside decorator
========================================
standard angular always put injectable service in constructor, if there is a lot of injectable service, this will cause the arguments to be bloated
custom decorator to use

add @WaveInjectable in class, and add @WaveInject in property

@WaveInjectable 
export class .....



@WaveInject mainService: MainService;

