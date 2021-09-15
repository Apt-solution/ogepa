$(document).ready(function(){
    var residential = ['Choose', 'Room', 'Self_Contain', 'Flat', 'Bungalow', 'Duplex', 'Minor_Shop'];
    var commercial = ['Choose','Commercial_Bank', 'Micro_Finance_Bank', 'School', 'Shopping_Complex', 'Printing_Shop',
                      'Food_Canteen', 'Big_Eatery', 'Small_Eatery', 'Super_Store', 'Medium_Store', 
                      'Mini_Supermarket', 'Religion_Center', 'Fuel_Station', 'Bakery', 'Hospital'
                     ];
    var industrial = ['Choose', '10 ton', '15-20 ton', 'compactor'];
    
    var no =[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]; 

   $('select#clientType').change(function(){
    var clientType = $(this).children("option:selected").val();
        if(clientType == 'Residential')
        {
            $('#sub_category').text('');
            $('#no_of_sub_category').text('');

            $('#catNo').show();
            $('#resident').show();
            for( const resident of residential)
            {
                $('#sub_category').append('<option value="'+resident+'">'+ resident + '</option>');
            }  
            for( const catNo of no)
            {
                $('#no_of_sub_category').append('<option value="'+catNo+'">'+ catNo + '</option>');

            }
        }
        else if(clientType == 'Commercial')
        {
            $('#no_of_sub_category').text('');
            $('#sub_category').text('');
            $('#catNo').show();
            $('#resident').show();
            for( const resident of commercial)
            {
               
                $('#sub_category').append('<option value="'+resident+'">'+ resident + '</option>');
            } 
            for( const catNo of no)
            {
                $('#no_of_sub_category').append('<option value="'+catNo+'">'+ catNo + '</option>');

            } 
        }
        else if(clientType == 'Industrial')
        {
            $('#sub_category').text('');
            $('#no_of_sub_category').text('');

            $('#catNo').show();
            $('#resident').show();
            for( const resident of industrial)
            {
                $('#sub_category').append('<option value="'+resident+'">'+ resident + '</option>');
            }  
                $('#no_of_sub_category').append('<option value="'+1+'">'+ 1 + '</option>');
        }
        else if(clientType == 'Medical')
        {
           $('#catNo').hide();
           $('#resident').hide();
        }
   });

   $("select#no_of_sub_category, select#sub_category").change(function(){
   
    $clientType = $('#sub_category').children("option:selected").val();
        $.ajax({
        type: 'GET',
        data: {'sub_category':$clientType},
        url: "{{ URL::to('getAmount') }}",
        success: function(data)
        {
           $no_of_sub_category = $('select#no_of_sub_category').children("option:selected").val();
           $amount = $no_of_sub_category * data;
           $('input:text#monthlyPayment').val($amount);
        }
        });
   });
   
});