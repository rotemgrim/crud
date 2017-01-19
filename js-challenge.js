/*
 CHALLENGE 1 A : Please write the source code of “EventsManager” Object
 */
var EventsManager = function () {

    var subscribers = {};

    var fireEvent = function (event, data) {

        // Fire Event with context if there is one.
        if (event['context'] !== null) {
            event['name'].call(event['context'], data);
        } else {
            event['name'](data);
        }

    };

    return {

        on: function (eventName, callback, context) {

            // Sets the callback obj with default context
            var callback = {"name": callback, "context": null};
            if (context != undefined) {
                callback['context'] = context;
            }
            if (!subscribers.hasOwnProperty(eventName)) {
                subscribers[eventName] = [];
            }

            // subscribe the event.
            subscribers[eventName].push(callback);
        },

        off: function (eventName, callback) {
            // quick remove of subscribers under specific event name
            delete subscribers[eventName];
        },

        trigger: function (eventName, data) {
            if (subscribers.hasOwnProperty(eventName)) {

                // Fire all callbacks under specific event name.
                subscribers[eventName].map(function (event) {
                    fireEvent(event, data)
                });
            }
        }
    }
};

var MyEventsManager = EventsManager();
/*
 CHALLENGE 1 B : Please write the source code of “Person”
 */

var Person = function (name, eventManager) {
    this.name = name;
    this.eventManager = eventManager;
    this.foods = [];
};

Person.prototype.waitToEat = function () {
    this.eventManager.on('breakfast:ready', this.eat, this);
}
Person.prototype.eat = function (foods) {
    console.log("i'm", this.name, "and i'm eating", foods.join(","));
    this.foods.length = 0;
    this.foods = foods;
    this.eventManager.trigger('eat:done', this);
};
Person.prototype.finishEat = function (time) {
    console.log("i'm", this.name, "and i finished eating at", time);
    this.eventManager.off("breakfast:ready", this.finishEat);
}
// logFood method has a task ahead
Person.prototype.logFood = function () {
    this.foods.forEach(function (item) {
        console.log("I'm " + this.name + " and I ate " + item);
    }.bind(this));
}

/*
 NOTICE : After you add your code of EventsManager you should run
 all the code and test your success with the code below.
 Meaning, the code below should work without any errors
 */
// start the app
MyEventsManager.on('eat:done', function (person) {
    console.log(person.name, "finished eating");
});
MyEventsManager.on('breakfast:ready', function (menu) {
    console.log("breakfast is ready with:", menu);
});
var john = new Person('john', MyEventsManager);
john.waitToEat();
MyEventsManager.on('eat:done', function (person) {
    person.finishEat(new Date());
});
var breakfast = ["scrambled eggs", "tomatoes", "bread", "butter"];
MyEventsManager.trigger('breakfast:ready', breakfast);
/*
 CHALLENGE 2: Please FIX the source code of “logFood” according to the instructions:
 this “logFood” method throws an error.
 "this.name" doesn't print the Person's name
 Please suggest 2 different solutions (by adding the relevant fix code)
 so "this.name" will print the relevant name
 */
john.logFood();
