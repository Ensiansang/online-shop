$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });
//Confirm Order Admin Panel
  $(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to confirm?',
                    text: "Once confirm, no turning back to pending",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, confirm it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Confirm!',
                        'Confirm Change',
                        'success'
                      )
                    }
                  }) 


    });

  });
  //End Confirm Order Admin Panel
  //Start Process Order Admin Panel
  $(function(){
    $(document).on('click','#process',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to process?',
                    text: "Once process, no turning back to pending",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, process it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Process!',
                        'Process Change',
                        'success'
                      )
                    }
                  }) 


    });

  });
  //End Process Order Admin Panel
    //Start Deliver Order Admin Panel
    $(function(){
      $(document).on('click','#deliver',function(e){
          e.preventDefault();
          var link = $(this).attr("href");
  
  
                    Swal.fire({
                      title: 'Are you sure to deliver?',
                      text: "Once deliver, no turning back to pending",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, deliver it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                          'Deliver!',
                          'Order Deliver',
                          'success'
                        )
                      }
                    }) 
  
  
      });
  
    });
    //End Deliver Order Admin Panel
    //Start Return Approve Order Admin Panel
    $(function(){
      $(document).on('click','#approve',function(e){
          e.preventDefault();
          var link = $(this).attr("href");
  
  
                    Swal.fire({
                      title: 'Are you sure to approve?',
                      text: "Return Order Approve",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, approve it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                          'Approve!',
                          'Approve Deliver',
                          'success'
                        )
                      }
                    }) 
  
  
      });
  
    });
    //End Return Approve Order Admin Panel

    //Start Cancel Approve Order Admin Panel
    $(function(){
      $(document).on('click','#cancel',function(e){
          e.preventDefault();
          var link = $(this).attr("href");
  
  
                    Swal.fire({
                      title: 'Are you sure to approve?',
                      text: "Cancel Order Approve",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, cancel it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                          'Cancel!',
                          'Order Cancel',
                          'success'
                        )
                      }
                    }) 
  
  
      });
  
    });
    //End Cancel Approve Order Admin Panel