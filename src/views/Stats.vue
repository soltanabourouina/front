<template>
<div class="stats">
  <h1 class="subheading grey--text">Statistiques</h1>
 <v-container class="my-5">
     
 <v-card>
 
    <v-card-title>
 <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>

    </v-card-title>

    <!--Modal pour l'ajout d'une enquete -->
      <v-dialog v-model="dialogAdd" persistent max-width="600px">
      <template v-slot:activator="{ on, attrs }">
          <v-btn color="primary" dark v-bind="attrs" v-on="on">
              Nouveau organisme
          </v-btn>
      </template>
      <v-card>
          <v-card-title>
              <span class="headline">Ajouter un organisme </span>
          </v-card-title>
          <v-card-text>
              <v-container>
                  <v-row>
                      <v-col cols="12">
                          <v-text-field label="Name*" v-model="name" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="description*" v-model="description" required>
                          </v-text-field>
                      </v-col>
                       <v-col cols="12">
                          <v-text-field label="price*" v-model="price" required>
                          </v-text-field>
                      </v-col>
                  </v-row>
              </v-container>
              <small>*indique qu'il faut remplir le champ</small>
          </v-card-text>
          <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="dialogAdd = false">Close</v-btn>
              <v-btn color="blue darken-1" text @click="saveInvestigations">Save</v-btn>
          </v-card-actions>
      </v-card>
  </v-dialog>

  <!--fin modal d'ajout-->
      <!-- Modal Update Product -->
                  
                        <v-dialog v-model="dialogEdit" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline">Modifier le produit</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                          <v-col cols="12">
                          <v-text-field label="Name*" v-model="name" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="description*" v-model="description" required>
                          </v-text-field>
                      </v-col>
                       <v-col cols="12">
                          <v-text-field label="price*" v-model="price" required>
                          </v-text-field>
                      </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialogEdit = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="updateInvestigations">Update</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                 
 
                    <!-- Modal Delete Product -->
                  
                        <v-dialog v-model="dialogDelete" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline"></span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <h2>confirmer la suppression  {{ name }} ?</h2>
                                        </v-row>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialogDelete = false">No</v-btn>
                                    <v-btn color="info darken-1" text @click="dialogDelete= false">Yes
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                   
 
    <v-data-table :headers="headers" :items="products" :search="search"  class="elevation-1">
      <template v-slot:item.actions="{ item }">
        <v-icon  small class="mr-2" @click="getEdit(item)"> mdi-pencil </v-icon>
        <v-icon small @click="deleteinvestigations(item)" >mdi-delete</v-icon>
      </template>
    </v-data-table>


  </v-card>
     </v-container>
</div>
</template>

<script>
 import axios from 'axios'

  export default {
    data() {
      return {
              search: '',
   
        headers: [
          {
            text: 'numero',
            align: 'start',
            sortable: false,
            value: 'id',
          },
          { text: 'name', value: 'name' },
          { text: 'description', value: 'description' },
           { text: 'price', value: 'price' },
          { text: 'Action', value:'actions' }
        ],
        name: '',
        description: '',
        price: '',
      
          dialogAdd: false,
        dialogEdit: false,
        dialogDelete: false,
        investigationsIdEdit: '',
        investigationsNameEdit: '',
        investigationsPriceEdit: '',
        id: '',
        investigationsNameDelete: '',
        products:[],
      }
    },

    created: function () {
        this.getProducts()
    },
   
      
  
 methods: {    
        // Get products
       getProducts : function () {
            axios
            .get('http://localhost:8000/api/products')
            .then((res) => {
                    this.products = res.data;
                     console.log(this.products);
                });
               
        },

    

  // Create New produit
        saveInvestigations: function () {
            axios.post('http://localhost:8000/api/products/', {
          
                   name: this.name,
                    description: this.description,
                    price: this.price
                })
                .then(res => {
                    // handle success
                    this.getProducts();
                    this.name = '';
                    this.description = '';
                    this.price = '';
                   
                    this.dialogAdd = false;
                    console.log(res);
                })
                
        },
 

 // Get Edit and Show data to Modal
        getEdit: function (item) {
            this.dialogEdit = true;
            this.id = item.id;
            this.name = item.name;
            this.description = item.description;
            this.price = item.price;
             
            console.log(this.id);
        },


        // Update produit
        updateInvestigations: function () {
            axios.put(`http://localhost:8000/api/products/` + this.id, {
                   name: this.name,
                    description: this.description,
                    price: this.price
                })
                .then(res => {
                    // handle success
                    this.getProducts();
                    this.dialogEdit = false;
                     console.log(res);
                })
                
        },



//Get Delete and Show Confirm Modal
 getDelete: function (item) {
 this.dialogDelete = true;
 this.id = item.id;
 // this.name = investigations.name;
  }, 
   // Delete investigations
        deleteinvestigations: function (item) {
            if(confirm("vous voulez vraiment supprimer ce produit ?")){
                axios.delete(`http://localhost:8000/api/products/`+item.id)
                .then(res => {
                    // handle success
                    this.getProducts();
                    this.dialogDelete = false;
                    console.log(res);
                })
            }
        }
  }}
</script>
