<template>
    <div class="container">
        <Steps :current="current">
            <Step title="Personal Information" icon="ios-person"></Step>
            <Step title="Employment Information" icon="ios-time"></Step>
            <Step title="Financial Information" icon="ios-cash"></Step>
        </Steps>

         <Form :model="formItem" label-position="right" :label-width="100">
            
            <div class="personal" v-if="personalProfile">

               
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
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
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
                            <Select v-model="formItem.marital_status" placeholder="Select Nationality">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>
                    </Col>
                    <Col span = "11">
                        <FormItem label="Age">
                            <Select v-model="formItem.age" placeholder="Select Nationality">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>                   
                    </Col>
                </Row>

                 <Row>
                    <Col span = "12">
                        <FormItem label="Gender">
                            <RadioGroup v-model="formItem.gender">
                                <Radio label="male">Male</Radio>
                                <Radio label="female">Female</Radio>
                            </RadioGroup>
                        </FormItem>
                    </Col>
                </Row>

                 <Row>
                    <Col span = "12">
                        <FormItem label="How many dependants do you have?">
                            <Select v-model="formItem.dependants" placeholder="Select Nationality">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>                
                    </Col>
                </Row>

               
                <Row>
                    <Col span = "12">
                       <FormItem label="What type of residence do you have?">
                            <Select v-model="formItem.residence" placeholder="Select Nationality">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>
                    </Col>
                </Row>

                <Row>
                    <Col span = "12">
                        <FormItem label="KRA PIN">
                            <Input v-model="formItem.kra_pin" placeholder="A001234567B"></Input>
                        </FormItem>  
                    </Col>
                    <Col span = "12">
                        <FormItem label="Desired Loan Amount">
                            <Input v-model="formItem.loan_amount" placeholder="50,000"></Input>
                        </FormItem>                  
                    </Col>
                </Row>              
                
            </div>

            <div class="employment" v-if="workProfile">

                <Row>
                    <Col span = "11">
                        <FormItem label="Current Job Length">
                            <Select v-model="formItem.nationality" placeholder="Select Nationality">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>
                    </Col>
                    <Col span = "11">
                        <FormItem label="Occupation Type">
                            <Select v-model="formItem.nationality" placeholder="Select Occupation type">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>                         
                    </Col>
                </Row>

                 <Row>
                    <Col span = "11">
                        <FormItem label="Business Nature">
                            <Input v-model="formItem.kra_pin" placeholder="Retail"></Input>
                        </FormItem> 
                    </Col>
                    <Col span = "11">
                        <FormItem label="Employer's Name">
                            <Input v-model="formItem.kra_pin" placeholder="A001234567B"></Input>
                        </FormItem>                    
                    </Col>
                </Row>

                 <Row>
                    <Col span = "12">
                         <FormItem label="Role in the Company">
                            <Select v-model="formItem.nationality" placeholder="CEO/Director">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>   
                    </Col>
                </Row>
                
            </div>

            <div class="finacial" v-if="financialProfile">

                <Row>
                    <Col span = "11">
                        <FormItem label="Mortage Value">
                            <Select v-model="formItem.nationality" placeholder="KES 500,000-1,000,000">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>
                    </Col>
                    <Col span = "11">
                        <FormItem label="Mortage Status">
                            <Select v-model="formItem.nationality" placeholder="Normal">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>                         
                    </Col>
                </Row>

                 <Row>
                    <Col span = "11">
                        <FormItem label="Number of Open Credit Cards">
                            <Select v-model="formItem.nationality" placeholder="1">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem> 
                    </Col>
                    <Col span = "11">
                        <FormItem label="Credit Utilization Rate">
                            <Select v-model="formItem.nationality" placeholder="80-89%">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>                
                    </Col>
                </Row>

                 <Row>
                    <Col span = "12">
                         <FormItem label="Credit Card Duration">
                            <Select v-model="formItem.nationality" placeholder="Less than a year">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>   
                    </Col>
                     <Col span = "12">
                         <FormItem label="Loan Status">
                            <Select v-model="formItem.nationality" placeholder="Fully Paid">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>   
                    </Col>
                </Row>

                <Row>
                    <Col span = "12">
                         <FormItem label="Income Expenditure Ratio">
                            <Select v-model="formItem.nationality" placeholder="1-1.5">
                                <Option value="beijing">New York</Option>
                                <Option value="shanghai">London</Option>
                                <Option value="shenzhen">Sydney</Option>
                            </Select>
                        </FormItem>   
                    </Col>
                </Row>
                
            </div>
 
        </Form>


        <p>Total Score is: 10</p>
        <Button type="primary" @click="next">Next step</Button>
    </div>
</template>
<script>
   export default {
        data () {
            return {
                current: 0,
                formItem: {
                    first_name: '',
                    last_name: '',
                    nationality: '',
                    age: '',
                    gender: '',
                    id_number: '',
                    loan_amount: '',
                    kra_pin: '',
                    marital_status: '',
                    dependents: '',
                    residence: '',
                },
                personalProfile: true,
                workProfile: false,
                financialProfile: false,

            }
        },
        methods: {
            next () {
                if (this.current == 3) {
                    this.current = 0;
                }else if(this.current ==0){
                    this.current += 1;
                    this.personalProfile= false;
                    this.workProfile= true;

                }else if(this.current == 1){
                    this.current += 1;
                    this.workProfile= false;
                    this.financialProfile= true;

                }else{

                    this.current = 0;
                    this.financialProfile= false;
                    this.personalProfile= true;


                }
            }
        }
    }
</script>
