<template>

    <div class="container" style="padding-top: 70px; padding-bottom: 20px;">

        <div class="container" style="padding: 10px 0">
        
            <Steps :current="current">
                <Step title="Personal Information" icon="ios-person"></Step>
                <Step title="AA Information" icon="ios-time"></Step>
                <Step title="Card Top Up Options" icon="ios-cash"></Step>
                <Step title="Attachemnts" icon="md-attach"></Step>
            </Steps>

        </div>

        <div class="container" style="padding: 10px 0">

            <Form :model="formItem" label-position="right" :label-width="100">
                
                <div class="personal" style="padding: 10px 0" v-if="personalProfile">

                
                    <Row>
                        <Col span = "11">
                            <FormItem label=" First Name">
                                <Input v-model="formItem.first_name" placeholder="First Name"></Input>
                            </FormItem>
                        </Col>
                        <Col span = "11">
                            <FormItem label=" Last Name">
                                <Input v-model="formItem.last_name" placeholder="Last Name"></Input>
                            </FormItem>                           
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Nationality">
                                <Select v-model="formItem.nationality" placeholder="Select Nationality">
                                    <Option v-for="(nat, n) in nationalities" :key="n" :value="nat.id">{{ nat.description }}</Option>
                                </Select>
                            </FormItem>
                        </Col>
                        <Col span = "11">
                            <FormItem label="ID Number">
                                <Input v-model="formItem.id_number" placeholder="11223344"></Input>
                            </FormItem>                          
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Marital Status">
                                <Select v-model="formItem.marital_status" placeholder="Select Marital Status">
                                    <Option v-for="(mar, m) in maritalstatus" :key="m" :value="mar.id">{{ mar.description }}</Option>
                                </Select>
                            </FormItem>
                        </Col>
                         <Col span = "11">
                            <FormItem label="KRA PIN">
                                <Input v-model="formItem.kra_pin" placeholder="A001234567B"></Input>
                            </FormItem>  
                        </Col>
                        
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Date of Birth">
                                <DatePicker type="date" placeholder="Select date" placement="bottom" style="width: auto"></DatePicker>
                            </FormItem>                   
                        </Col>
                        <Col span = "11">
                            <FormItem label="Gender">
                                <RadioGroup v-model="formItem.gender">
                                    <Radio label="1">Male</Radio>
                                    <Radio label="2">Female</Radio>
                                </RadioGroup>
                            </FormItem>
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Contact">
                                <Input v-model="formItem.id_number" placeholder="+254711223344"></Input>
                            </FormItem>                
                        </Col>
                        <Col span = "11">
                            <FormItem label="Email">
                                <Input v-model="formItem.email" placeholder="Email"></Input>
                            </FormItem>                           
                        </Col>
                    </Row>

                    <Row>
                       <Col span = "11">
                            <FormItem label="Postal Address">
                                <Input v-model="formItem.id_number" placeholder="1320"></Input>
                            </FormItem>
                        </Col>
                        <Col span = "11">
                            <FormItem label="City">
                                <Input v-model="formItem.loan_amount" placeholder="Nairobi"></Input>
                            </FormItem>                  
                        </Col>
                    </Row>              
                    
                </div>

                <div class="employment" style="padding: 10px 0" v-if="workProfile">

                    <Row>
                        <Col span = "11">
                            <FormItem label="Membership Number">
                                <Input v-model="formItem.id_number" placeholder="AAK2020"></Input>
                            </FormItem>
                        </Col>
                         <Col span = "11">
                            <FormItem label="Vehicle registration">
                                <Input v-model="formItem.id_number" placeholder="KAA 035J"></Input>
                            </FormItem>
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Vehicle Make">
                                <Input v-model="formItem.business_nature" placeholder="Toyota"></Input>
                            </FormItem> 
                        </Col>
                        <Col span = "11">
                            <FormItem label="Vehicle Model">
                                <Input v-model="formItem.employer" placeholder="Prius"></Input>
                            </FormItem>                    
                        </Col>
                    </Row>
                </div>

                <div class="finacial" style="padding: 10px 0" v-if="financialProfile">

                    <Row>
                        <Col span = "11">
                           <FormItem>
                                <Checkbox v-model="debit">Debit my account with applicable fee(s) and charge(s)/ <strong>(For SBM Bank Customers Only)</strong></Checkbox>
                            </FormItem> 
                        </Col>
                        <Col span = "11"  v-if="debit">
                            <FormItem label="Account Number">
                                <Input v-model="formItem.employer" placeholder="01010304803435"></Input>
                            </FormItem>                           
                        </Col>
                    </Row>

                    <Row>
                         <Col span = "11">
                            <FormItem>
                               <Checkbox label="eft" v-model="eft">EFT</Checkbox>
                                <Checkbox label="cash" v-model="cash">Cash</Checkbox>
                            </FormItem> 
                        </Col>
                         <Col span = "11">
                           <FormItem label="Account Number">
                                <Input v-model="formItem.employer" placeholder="01010304803435"></Input>
                            </FormItem> 
                        </Col>
                    </Row>              
                </div>

                <div class="files" style="padding: 10px 0" v-if="filesUpload">

                    <div class="container">
                    
                        <h5>Please make sure to upload the following documents:</h5>
                        <span>(Those marked in * are mandatory uploads)</span>

                        <div class="container" style="padding: 10px 0">


                            <ul>
                                <li> <span style="color:red;">*</span> Certified Copy of KRA PIN Certificate</li>
                                <li> <span style="color:red;">*</span> Certified Copy of National Identification / Passport</li>

                            </ul>

                        </div>

                        <div class="container" style="padding: 10px 0">

                            <Upload :on-success="handleSuccess"
                                :on-error="handleError"
                                :format="['pdf']"
                                :max-size="2048"
                                :on-format-error="handleFormatError"
                                :on-exceeded-size="handleMaxSize"
                                multiple
                                ref = "uploads"
                                type="drag"
                                :headers="{'x-csrf-token': token, 'X-Requested-With': 'XMLHttpRequest' }"
                                action="/application/uploads">
                                <div style="padding: 20px 0">
                                    <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                                    <p>Click or drag file here to upload</p>
                                </div>
                            </Upload>
                            
                        </div>

                    </div>
                    
                </div>
    
            </Form>

        </div>

        <div class="container">
            <Button type="primary" v-if="prevButton" @click="previous">Previous</Button>
            <Button type="primary" v-if="nextButton" @click="next">Next step</Button>
            <Button class="pull-right" type="success" v-if="saveApplication" @click="saveApp">Submit</Button>
        </div>

    </div>
</template>
<script>
   export default {
        data () {
            return {
                current: 0,
                token: '',
                formItem: {
                    first_name: '',
                    last_name: '',
                    nationality: '',
                    age: '',
                    gender: 0,
                    email:'',
                    id_number: '',
                    loan_amount: '',
                    kra_pin: '',
                    marital_status: '',
                    dependents: '',
                    residence: '',
                    current_job: '',
                    previous_job:'',
                    business_nature:'',
                    employer:'',
                    occupation_type:'',
                    job_role:'',
                    mortage_value:'',
                    mortage_status:'',
                    credit_number:'',
                    credit_use:'',
                    credit_length: '',
                    loan_status:'',
                    expenditure:'',
                    uploads: '',
                },
                answers: [],
                image:[],
                ages:[],
                nationalities: [],
                maritalstatus: [],
                dependants: [],
                residencetypes: [],
                occupationlength: [],
                occupationtype: [],
                mortagevalue: [],
                mortagestatus: [],
                opencreditcard: [],
                creditusage: [],
                creditlength: [],
                loanstatus: [],
                expenditure: [],
                jobtitle: [],
                personalProfile: true,
                workProfile: false,
                financialProfile: false,
                filesUpload: false,
                nextButton: true,
                prevButton:false,
                saveApplication: false,
                debit: false,
                eft: false,
                cash: false,
            }
        },
        methods: {
            next () {
                if (this.current == 3) {
                    
                    this.current = 0;


                }else if(this.current == 0){
                    
                    this.prevButton = true;
                    this.current += 1;
                    this.personalProfile= false;
                    this.workProfile= true;

                }else if(this.current == 1){
                    
                    this.prevButton = true;
                    this.current += 1;
                    this.workProfile= false;
                    this.financialProfile= true;



                }else if(this.current == 2){

                    this.prevButton = true;
                    this.nextButton = false;
                    this.current += 1;
                    this.financialProfile= false;
                    this.filesUpload= true;

                }
            },
            previous () {
               
                if(this.current == 0){

                    this.prevButton = false;

                }
                else if(this.current == 1){

                    this.current -= 1;
                    this.personalProfile= true;
                    this.workProfile= false;


                }else if(this.current == 2){

                    this.current -= 1;
                    this.workProfile= true;
                    this.financialProfile= false;

                }else if(this.current == 3){

                    this.nextButton = true;
                    this.current -= 1;
                    this.financialProfile= true;
                    this.filesUpload= false;

                }
            },
            handleSuccess (res, file) {

				if(this.image.length){

					this.image.push(res);

				}else{
                    
                    this.image[0] = res;
                    
                }

                if(this.image.length >= 1){

                    this.saveApplication = true;

				}

                this.formItem.uploads = JSON.stringify(this.image);
				
			},
			handleError (res, file) {
					
				this.$Notice.warning({
                    title: 'The file format is incorrect',
                    desc: file.errors.file.length ? file.errors.file[0] : 'Something went wrong'
                });   
            
			},
            handleFormatError (file) {
                this.$Notice.warning({
                    title: 'The file format is incorrect',
                    desc: 'File format of ' + file.name + ' is incorrect, please select jpg or png.'
                });
            },
            handleMaxSize (file) {
                this.$Notice.warning({
                    title: 'Exceeding file size limit',
                    desc: 'File  ' + file.name + ' is too large, no more than 2M.'
                });
            },
            async saveApp() {
            
                const res = await this.callApi('post', '/application/send', this.formItem);
				if(res.status == 201){
					
					this.s('Successfully Applied for Credit');
					// window.location = '/';


				}else{
					
					if(res.status == 422){
						
						for(let i in res.data.errors){
							this.e(res.data.errors[i][0])
						}

					}else{					
						this.d();
					}					

				}
			
            },

        },

        async created() {
            
            // const res = 'Test email';
           
            const res = await this.callApi('get', '/answers');

            if(res.status == 200){
                this.answers = res.data;
                this.ages = this.answers['age'];
                this.nationalities = this.answers['nationality'];
                this.maritalstatus = this.answers['marital_status'];
                this.dependants = this.answers['dependents'];
                this.residencetypes = this.answers['residence_type'];
                this.occupationlength = this.answers['occupation_length'];
                this.occupationtype = this.answers['occupation_type'];
                this.mortagevalue = this.answers['mortage_value'];
                this.mortagestatus = this.answers['mortage_status'];
                this.opencreditcard = this.answers['open_credits_number'];
                this.creditusage = this.answers['credit_use_rate'];
                this.creditlength = this.answers['credit_card_length'];
                this.loanstatus = this.answers['loan_status'];
                this.expenditure = this.answers['income_expenditure_ratio'];
                this.jobtitle = this.answers['job_title'];

            }else{
                this.d();
            }
        },
       
    }
</script>
