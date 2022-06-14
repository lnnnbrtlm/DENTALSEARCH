
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic</title>
</head>
<body>
    <form id="clinicForm">
        <input type="text" name="user_id" id="user_id" value="5">
        <div>
            <label for="name">Clinic Name</label>
            <input type="text" id="name" name="name" required/>
        </div>
        <div>
            <label for="desc">Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="7"></textarea>
        </div>
        <div>
            <label for="contactno">Contact Number</label>
            <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact number">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com">
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Blk/Street No."/>
        </div>
        <div>
            <div>
                <label for="ortho1">
                    <input type="checkbox" data-sertype="Orthodontics" data-sertime="00:30:00" name="ortho1" id="ortho1" value="ortho1" />Ortho1
                </label>
                <label for="ortho2">
                    <input type="checkbox" data-sertype="Orthodontics" data-sertime="01:00:00" name="ortho2" id="ortho2" value="ortho2" />Ortho2
                </label>
                <label for="ortho3">
                    <input type="checkbox" data-sertype="Orthodontics" data-sertime="02:00:00" name="ortho3" id="ortho3" value="ortho3" />Ortho3
                </label>
                <label for="ortho4">
                    <input type="checkbox" data-sertype="Orthodontics" data-sertime="01:30:00" name="ortho4" id="ortho4" value="ortho4" />Ortho4
                </label>
                <label for="ortho5">
                    <input type="checkbox" data-sertype="Orthodontics" data-sertime="02:30:00" name="ortho5" id="ortho5" value="ortho5" />Ortho5
                </label>
                <label for="ortho6">
                    <input type="checkbox" data-sertype="Orthodontics" data-sertime="02:30:00" name="ortho6" id="ortho6" value="ortho6" />Ortho6
                </label>
                <label for="pedia1">
                    <input type="checkbox" data-sertype="Pediatrics" data-sertime="00:30:00" name="pedia1" id="pedia1" value="pedia1" />Pedia1
                </label>
                <label for="pedia2">
                    <input type="checkbox" data-sertype="Pediatrics" data-sertime="01:00:00" name="pedia2" id="pedia2" value="pedia2" />Pedia2
                </label>
                <label for="pedia3">
                    <input type="checkbox" data-sertype="Pediatrics" data-sertime="02:00:00" name="pedia3" id="pedia3" value="pedia3" />Pedia3
                </label>
                <label for="pedia4">
                    <input type="checkbox" data-sertype="Pediatrics" data-sertime="02:00:00" name="pedia4" id="pedia4" value="pedia4" />Pedia4
                </label>
                <label for="pedia5">
                    <input type="checkbox" data-sertype="Pediatrics" data-sertime="02:00:00" name="pedia5" id="pedia5" value="pedia5" />Pedia5
                </label>
                <label for="pedia6">
                    <input type="checkbox" data-sertype="Pediatrics" data-sertime="02:00:00" name="pedia6" id="pedia6" value="pedia6" />Pedia6
                </label>
                <label for="dent1">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="00:30:00" name="dent1" id="dent1" value="dent1" />Dent1
                </label>
                <label for="dent2">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="dent2" id="dent2" value="dent2" />Dent2
                </label>
                <label for="dent3">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="dent3" id="dent3" value="dent3" />Dent3
                </label>
                <label for="dent4">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="dent4" id="dent4" value="dent4" />Dent4
                </label>
                <label for="dent5">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="dent5" id="dent5" value="dent5" />Dent5
                </label>
                <label for="dent6">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="dent6" id="dent6" value="dent6" />Dent6
                </label>
            </div>
        </div>
        <div>
            <div>
                <input type="checkbox" id="sunday" name="sunday" value='Sunday'/>
                <label for="sunday">Sunday</label>
            </div>
            <div>
                <input type="checkbox" id="monday" name="monday" value='Monday'/>
                <label for="monday">Monday</label>
            </div>
            <div>
                <input type="checkbox" id="tuesday" name="tuesday" value='Tuesday'/>
                <label for="tuesday">Tuesday</label>
            </div>
            <div>
                <input type="checkbox" id="wednesday" name="wednesday" value='Wednesday'/>
                <label for="wednesday">Wednesday</label>
            </div>
            <div>
                <input type="checkbox" id="thursday" name="thursday" value='Thursday'/>
                <label for="thursday">Thursday</label>
            </div>
            <div>
                <input type="checkbox" id="friday" name="friday" value='Friday'/>
                <label for="friday">Friday</label>
            </div>
            <div>
                <input type="checkbox" id="saturday" name="saturday" value='Saturday'/>
                <label for="saturday">Saturday</label>
            </div>
        </div>
        <div>
            <label for="start_time">Start Time</label>
            <input type="time" id="start_time" name="start_time" required/>
        </div>
        <div>
            <label for="end_time">End Time</label>
            <input type="time" id="end_time" name="end_time" required/>
        </div>
        <button type="submit" name="clinicAdd">Add</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script>
    $('#clinicForm').on('submit', (e) => {
        e.preventDefault();
        var user_id = $('#user_id');
        var name = $('#name');
        var desc = $('#desc');
        var contactno = $('#contactno');
        var email = $('#email');
        var address = $('#address');
        var start_time = $('#start_time');
        var end_time = $('#end_time');
        // services
        var ortho1 = $('#ortho1').is(':checked') ? [$('#ortho1').val(), $('#ortho1').attr('data-sertype'), $('#ortho1').attr('data-sertime')] : null;
        var ortho2 = $('#ortho2').is(':checked') ? [$('#ortho2').val(), $('#ortho2').attr('data-sertype'), $('#ortho2').attr('data-sertime')] : null;
        var ortho3 = $('#ortho3').is(':checked') ? [$('#ortho3').val(), $('#ortho3').attr('data-sertype'), $('#ortho3').attr('data-sertime')] : null;
        var ortho4 = $('#ortho4').is(':checked') ? [$('#ortho4').val(), $('#ortho4').attr('data-sertype'), $('#ortho4').attr('data-sertime')] : null;
        var ortho5 = $('#ortho5').is(':checked') ? [$('#ortho5').val(), $('#ortho5').attr('data-sertype'), $('#ortho5').attr('data-sertime')] : null;
        var ortho6 = $('#ortho6').is(':checked') ? [$('#ortho6').val(), $('#ortho6').attr('data-sertype'), $('#ortho6').attr('data-sertime')] : null;
        var pedia1 = $('#pedia1').is(':checked') ? [$('#pedia1').val(), $('#pedia1').attr('data-sertype'), $('#pedia1').attr('data-sertime')] : null;
        var pedia2 = $('#pedia2').is(':checked') ? [$('#pedia2').val(), $('#pedia2').attr('data-sertype'), $('#pedia2').attr('data-sertime')] : null;
        var pedia3 = $('#pedia3').is(':checked') ? [$('#pedia3').val(), $('#pedia3').attr('data-sertype'), $('#pedia3').attr('data-sertime')] : null;
        var pedia4 = $('#pedia4').is(':checked') ? [$('#pedia4').val(), $('#pedia4').attr('data-sertype'), $('#pedia4').attr('data-sertime')] : null;
        var pedia5 = $('#pedia5').is(':checked') ? [$('#pedia5').val(), $('#pedia5').attr('data-sertype'), $('#pedia5').attr('data-sertime')] : null;
        var pedia6 = $('#pedia6').is(':checked') ? [$('#pedia6').val(), $('#pedia6').attr('data-sertype'), $('#pedia6').attr('data-sertime')] : null;
        var dent1 = $('#dent1').is(':checked') ? [$('#dent1').val(), $('#dent1').attr('data-sertype'), $('#dent1').attr('data-sertime')] : null;
        var dent2 = $('#dent2').is(':checked') ? [$('#dent2').val(), $('#dent2').attr('data-sertype'), $('#dent2').attr('data-sertime')] : null;
        var dent3 = $('#dent3').is(':checked') ? [$('#dent3').val(), $('#dent3').attr('data-sertype'), $('#dent3').attr('data-sertime')] : null;
        var dent4 = $('#dent4').is(':checked') ? [$('#dent4').val(), $('#dent4').attr('data-sertype'), $('#dent4').attr('data-sertime')] : null;
        var dent5 = $('#dent5').is(':checked') ? [$('#dent5').val(), $('#dent5').attr('data-sertype'), $('#dent5').attr('data-sertime')] : null;
        var dent6 = $('#dent6').is(':checked') ? [$('#dent6').val(), $('#dent6').attr('data-sertype'), $('#dent6').attr('data-sertime')] : null;
        // days
        var sunday = $('#sunday').is(':checked') ? $('#sunday').val() : null;
        var monday = $('#monday').is(':checked') ? $('#monday').val() : null;
        var tuesday = $('#tuesday').is(':checked') ? $('#tuesday').val() : null;
        var wednesday = $('#wednesday').is(':checked') ? $('#wednesday').val() : null;
        var thursday = $('#thursday').is(':checked') ? $('#thursday').val() : null;
        var friday = $('#friday').is(':checked') ? $('#friday').val() : null;
        var saturday = $('#saturday').is(':checked') ? $('#saturday').val() : null;
        if((name.val() != '') &&
           (start_time.val() != '') &&
           (end_time.val() != '')
        ){
            $.ajax({
                url: 'clinictry1.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    user_id: user_id.val(),
                    name: name.val(),
                    desc: desc.val(),
                    contactno: contactno.val(), 
                    email: email.val(),
                    address: address.val(),
                    ortho1: ortho1,
                    ortho2: ortho2,
                    ortho3: ortho3,
                    ortho4: ortho4,
                    ortho5: ortho5,
                    ortho6: ortho6,
                    pedia1: pedia1,
                    pedia2: pedia2,
                    pedia3: pedia3,
                    pedia4: pedia4,
                    pedia5: pedia5,
                    pedia6: pedia6,
                    dent1: dent1,
                    dent2: dent2,
                    dent3: dent3,
                    dent4: dent4,
                    dent5: dent5,
                    dent6: dent6,
                    sunday: sunday,
                    monday: monday,
                    tuesday: tuesday,
                    wednesday: wednesday,
                    thursday: thursday,
                    friday: friday,
                    saturday: saturday,
                    start_time: start_time.val(),
                    end_time: end_time.val()
                }, success: function(response){
                    $('#clinicForm')[0].reset();
                }
            });
        }
    });
    </script>
</body>
</html>