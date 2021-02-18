let users = $('#refers').data('fieldId');
let amount = $('#amount').data('fieldId');



var config = {
        container: "#custom-colored",

        nodeAlign: "BOTTOM",
        
        connectors: {
            type: 'step'
        },
        node: {
            HTMLclass: 'nodeExample1'
        }
    }


    var admin = {
        text: {
            name: "Administrador",
            
        },
        image: '/images/avatar.png'
    }

    var aux=0;
    var user = new Array();
    for (let i = 1; i < amount; i++) {
        
 
        console.log(i)

     user[aux] = {
        parent: admin,
        HTMLclass: 'blue',
        text:{
            name: users[i].name,
            code: users[i].user_id,
           
        },
        image:'/images/avatar.png'
    }
    aux++;


    }
    
    var chart_config = [
        config,
        admin
    ];

    for (let i = 0; i < user.length; i++) {
        
        
        chart_config.push(user[i]);
        
        
    }

    // Another approach, same result
    // JSON approach