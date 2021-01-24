function getdata() {
    var user=document.getElementById("user").value;


    var database = firebase.database();
    var ref = database.ref('Users/PickupDetails');

    ref.on('value', function(snapshot){
        var data = snapshot.val();
        var keys = Object.keys(data);

        var k = keys[0];
        var quantity = data[k].quantity;
        var type = data[k].type;
        console.log(quantity)
        console.log(type);
    }, function(error){
        console.log("Error: " + error.code);
    })


}