<template>

    <div class="container" style="padding-top: 70px; padding-bottom: 20px;">

        <div class="container" style="padding: 10px 0">
        
            <Steps :current="current">
                <Step title="Personal Information" icon="ios-person"></Step>
                <Step title="Employment Information" icon="ios-time"></Step>
                <Step title="Financial Information" icon="ios-cash"></Step>
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
                            <FormItem label="Age">
                                <Select v-model="formItem.age" placeholder="Select Age">
                                    <Option v-for="(ag, a) in ages" :key="a" :value="ag.id">{{ ag.description }}</Option>
                                </Select>
                            </FormItem>                   
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Email">
                                <Input v-model="formItem.email" placeholder="Email"></Input>
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
                            <FormItem label="Number of dependents">
                                <Select v-model="formItem.dependants" placeholder="Select Dependnets">
                                    <Option v-for="(dep, d) in dependants" :key="d" :value="dep.id">{{ dep.description }}</Option>
                                </Select>
                            </FormItem>                
                        </Col>
                        <Col span = "11">
                        <FormItem label="Residence type">
                                <Select v-model="formItem.residence" placeholder="Select Residence Type">
                                    <Option v-for="(res, r) in residencetypes" :key="r" :value="res.id">{{ res.description }}</Option>
                                </Select>
                            </FormItem>
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="KRA PIN">
                                <Input v-model="formItem.kra_pin" placeholder="A001234567B"></Input>
                            </FormItem>  
                        </Col>
                        <Col span = "11">
                            <FormItem label="Desired Loan Amount">
                                <Input v-model="formItem.loan_amount" placeholder="50,000"></Input>
                            </FormItem>                  
                        </Col>
                    </Row>              
                    
                </div>

                <div class="employment" style="padding: 10px 0" v-if="workProfile">

                    <Row>
                        <Col span = "11">
                            <FormItem label="Current Job Length">
                                <Select v-model="formItem.current_job" placeholder="Select Occupation Period">
                                    <Option v-for="(occ, o) in occupationlength" :key="o" :value="occ.id">{{ occ.description }}</Option>
                                </Select>
                            </FormItem>
                        </Col>
                        <Col span = "11" v-if="formItem.current_job == 21 || formItem.current_job == 22">
                            <FormItem label="Previous Job Length">
                                <Select v-model="formItem.previous_job" placeholder="Select Previous Occupation Length">
                                    <Option v-for="(occ, o) in occupationlength" :key="o" :value="occ.id">{{ occ.description }}</Option>
                                </Select>
                            </FormItem>
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Business Nature">
                                <Input v-model="formItem.business_nature" placeholder="Retail"></Input>
                            </FormItem> 
                        </Col>
                        <Col span = "11">
                            <FormItem label="Employer's Name">
                                <Input v-model="formItem.employer" placeholder="A001234567B"></Input>
                            </FormItem>                    
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Occupation Type">
                                <Select v-model="formItem.occupation_type" placeholder="Select Occupation type">
                                    <Option v-for="(occu, oc) in occupationtype" :key="oc" :value="occu.id">{{ occu.description }}</Option>
                                </Select>
                            </FormItem>                         
                        </Col>

                        <Col span = "11">
                            <FormItem label="Role in the Company">
                                <Select v-model="formItem.job_role" placeholder="Select Job Title">
                                    <Option v-for="(job, j) in jobtitle" :key="j" :value="job.id">{{ job.description }}</Option>
                                </Select>
                            </FormItem>   
                        </Col>
                    </Row>
                    
                </div>

                <div class="finacial" style="padding: 10px 0" v-if="financialProfile">

                    <Row>
                        <Col span = "11">
                            <FormItem label="Mortage Value">
                                <Select v-model="formItem.mortage_value" placeholder="Select Mortage Value">
                                    <Option v-for="(mor, m) in mortagevalue" :key="m" :value="mor.id">{{ mor.description }}</Option>
                                </Select>
                            </FormItem>
                        </Col>
                        <Col span = "11">
                            <FormItem label="Mortage Status">
                                <Select v-model="formItem.mortage_status" placeholder="Select Mortage Status">
                                    <Option v-for="(mort, mo) in mortagestatus" :key="mo" :value="mort.id">{{ mort.description }}</Option>
                                </Select>
                            </FormItem>                         
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Number of Open Credit Cards">
                                <Select v-model="formItem.credit_number" placeholder="Select Number of Open Credit Cards">
                                    <Option v-for="(cred, cr) in opencreditcard" :key="cr" :value="cred.id">{{ cred.description }}</Option>
                                </Select>
                            </FormItem> 
                        </Col>
                        <Col span = "11">
                            <FormItem label="Credit Utilization Rate">
                                <Select v-model="formItem.credit_use" placeholder="Select Utilization Rate">
                                    <Option v-for="(cre, c) in creditusage" :key="c" :value="cre.id">{{ cre.description }}</Option>
                                </Select>
                            </FormItem>                
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Credit Card Length">
                                <Select v-model="formItem.credit_length" placeholder="Select Credit Card Length">
                                    <Option v-for="(crl, cl) in creditlength" :key="cl" :value="crl.id">{{ crl.description }}</Option>
                                </Select>
                            </FormItem>   
                        </Col>
                        <Col span = "11">
                            <FormItem label="Loan Status">
                                <Select v-model="formItem.loan_status" placeholder="Select Loan Status">
                                    <Option v-for="(loan, l) in loanstatus" :key="l" :value="loan.id">{{ loan.description }}</Option>
                                </Select>
                            </FormItem>   
                        </Col>
                    </Row>

                    <Row>
                        <Col span = "11">
                            <FormItem label="Income Expenditure Ratio">
                                <Select v-model="formItem.expenditure" placeholder="Select Expenditure Ratio">
                                    <Option v-for="(exp, e) in expenditure" :key="e" :value="exp.id">{{ exp.description }}</Option>
                                </Select>
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
                                <li> <span style="color:red;">*</span> Certified Copy of employment letter</li>
                                <li> <span style="color:red;">*</span> Certified Copy for Proof of Residence</li>
                                <li> <span style="color:red;">*</span> Certified Copy of KRA PIN Certificate</li>
                                <li> <span style="color:red;">*</span> Certified Copy of National Identification / Passport</li>
                                <li> <span style="color:red;">*</span> Certified opy of Latest Payslips (3 months)</li>
                                <li> <span style="color:red;">*</span> Certified Copy of Bank Statement (3 months)</li>
                                <li>Certified Copy of Work Permit (For foreigners)</li>

                            </ul>

                            <!-- <CheckboxGroup v-model="border">
                                <Checkbox label="Certified Copy of employment letter" border></Checkbox>
                                <Checkbox label="Certified Copy of KRA PIN Certificate" border></Checkbox>
                                <Checkbox label="Certified Copy of National Identification / Passport" border></Checkbox>
                                <Checkbox label="Certified opy of Latest Payslips (3 months) / Certified Copy of Bank Statement (3 months)" border></Checkbox>
                                <Checkbox label="Certified Copy of Work Permit (For foreigners)" border></Checkbox>
                                <Checkbox label="Certified Copy for Proof of Residence" border></Checkbox>
                            </CheckboxGroup> -->

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

                if(this.image.length >= 5){

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
