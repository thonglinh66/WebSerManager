 <template>
 <div class="content-wrapper"> 
                 <div style="margin-left:40%; font-size:30px; padding-bottom:10px">Biểu đồ trung bình điểm từng khóa</div>
              <chart :height="170"  :chart-data="datacollection"></chart>
</div>

</template>
    <script>
    import Chart from "./Line.vue";
    export default {
      components: {
        Chart
      },
      data() {
        return {
          datacollection: null
        };
      },
      mounted() {
        this.fillData();
      },
      methods: {
        fillData() {
        let uri = 'http://127.0.0.1:8000/api/chartline';
         let Prices = new Array();
         let Labels = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            if(data) {
               data.forEach(element => {
               Prices.push(element.scores);
               Labels.push(element.K);

               });
               this.datacollection = {
                   labels:Labels,
               datasets: [{
                   label: 'Khóa',
                  data: Prices
                }]
               }
            }
       else {
          console.log('No data');
       }
        s}); 
        }
      }
    }
     
    
 </script>
