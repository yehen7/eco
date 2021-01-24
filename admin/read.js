function read()
{
    var ref = database.ref('Users/PickupDetails');
    ref.on("child_added",function(data)
    {
        var value= data.val();
        console.log(value);
        document.getElementById("user").innerHTML+=`
        <div class="card-body">
        <h5 class="card-text">${value.quantity}</h5>
        <h5 class="card-text">${value.type}</h5>
        </div>
        
        
        `
    })
}