let refers = $('#refers').data('fieldId');
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

  
    
    var user = {
        text: {
            name: "Usuario",
            
        },
        image: '/images/avatar.png'
    }
    
    var refer = new Array();
    var tipo;
    var list = new Array();
    var k=0;
    var aux=0;

    for (let i = 1; i <= amount; i++) {
        
        for (let x = 0; x < refers[i].length; x++) {
            
                     
            if(i == 1)
            {
                tipo=user;
            }
            else{


                for(let m =0; m < list.length; m++)
                {
                    if(refers[i][x].sponsor_id == list[m].sponsor_id)
                    {
                       
                        tipo = list[m].variable
                        break;
                    }
                }
            }
         
            
            refer[aux] = {
                parent: tipo,
                HTMLclass: 'blue',
                text:{
                    name: refers[i][x].user.name,
                    code: refers[i][x].user_id,
                    
                },
                image: "/images/avatar.png"
            }

            list[k]=  {
                    variable: refer[aux],                   
                   sponsor_id : refers[i][x].user_id

                }
                
                aux++;
                k++;
           

            
        }

        
    }
    
    
    var chart_config = [config,user];
    
    for (let i = 0; i < refer.length; i++) {
        
        
        chart_config.push(refer[i]);
        
        
    }
   