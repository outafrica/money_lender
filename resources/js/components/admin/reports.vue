<template>
    <div>
        <div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
                    <h3>Users Application</h3>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Desired Credit</th>
								<th>Actions</th>
							</tr>
								<!-- TABLE TITLE -->

								<!-- ITEMS -->
							<tr v-for="(application, app) in applications " :key="app">
								<td>{{app + 1}}</td>
								<td class="_table_name">{{application.first_name}} {{application.last_name}}</td>
								<td> Kshs.{{ Number(application.desired_credit_limit).toLocaleString() }}</td>
								<td>
									<Button type="info" size="small" @click="showReportModal(application, app)">View Profile</Button>
								</td>
							</tr>
								<!-- ITEMS -->
						</table>
					</div>
					<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->

                    	<!--~~~~~~~ Begining of Profile addition modal ~~~~~~~~~-->

					 <Modal
						v-model="showProfileModal"
						title="Applicant Profile"
						:mask-closable="false"
						:closable="false"
						>


                        <p style="color: black;">Full Name: <span><strong>{{ applicant.first_name }} {{applicant.last_name }}</strong></span><p> 

                        <div style="margin: 10px;"></div>
                        
                            <p style="color: black"> Requested Loan Amount:</p>
                            <p style="color: black"><i> Kshs.{{ Number(applicant.desired_credit_limit).toLocaleString() }}</i> </p>

                        <div style="margin: 20px;"></div>

                            <table class="_table">
                                <tr>
                                    <th>Risk Parameter</th>
                                    <th>Criteria</th>
                                    <th>Points</th>
                                </tr>
                                <tr>
                                    <td class="_table_name">Age</td>
                                    <td>{{profile.age}}</td>
                                    <td><i>{{profile.age_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Nationality</td>
                                    <td>{{profile.nationality}}</td>
                                    <td><i>{{profile.nationality_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Marital Status</td>
                                    <td>{{profile.marital_status}}</td>
                                    <td><i>{{profile.marital_status_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Dependants</td>
                                    <td>{{profile.dependents}}</td>
                                    <td><i>{{profile.dependents_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Residence Type</td>
                                    <td>{{profile.residence_type}}</td>
                                    <td><i>{{profile.residence_type_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Occupation Length</td>
                                    <td>{{profile.occupation_length}}</td>
                                    <td><i>{{profile.occupation_length_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Occupation Type</td>
                                    <td>{{profile.occupation_type}}</td>
                                    <td><i>{{profile.occupation_type_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Job Title</td>
                                    <td>{{profile.job_title}}</td>
                                    <td><i>{{profile.job_title_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Mortage Value</td>
                                    <td>{{profile.mortage_value}}</td>
                                    <td><i>{{profile.mortage_value_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Mortage Status</td>
                                    <td>{{profile.mortage_status}}</td>
                                    <td><i>{{profile.mortage_status_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Open Credit Cards</td>
                                    <td>{{profile.open_credits_number}}</td>
                                    <td><i>{{profile.open_credits_number_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Credit Utilization</td>
                                    <td>{{profile.credit_use_rate}}</td>
                                    <td><i>{{profile.credit_use_rate_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Credit Card History</td>
                                    <td>{{profile.credit_card_length}}</td>
                                    <td><i>{{profile.credit_card_length_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Existing Loan Status</td>
                                    <td>{{profile.loan_status}}</td>
                                    <td><i>{{profile.loan_status_point}}</i></td>
                                </tr>
                                <tr>
                                    <td class="_table_name">Income Expenditure Ratio</td>
                                    <td>{{profile.income_expenditure_ratio}}</td>
                                    <td><i>{{profile.income_expenditure_ratio_point}}</i></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="color: black;"><strong>Total Points</strong></td>
                                    <td>{{profile.total_points}}</td>
                                </tr>
                            </table>


                        <div style="margin: 10px;"></div>

                            <p style="color: black">Percentage Score: </p>

                            <Progress :percent= profile.percentage_points :stroke-width="20" text-inside />

                        <div style="margin: 10px;"></div>

                            <p style="color: black"> Allowable Loan Amount:</p>
                            <p style="color: black"><i>{{ profile.deserved_loan }}</i> </p>

                        <div style="margin: 10px;"></div>
						
                        <div slot="footer">
							<!-- <Button type="success" @click="addExpense" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding...' : 'Add Expense'}}</Button> -->
							<Button type="error" @click="showProfileModal=false">Close</Button>
						</div>
					</Modal>

					<!--~~~~~~~ End of Expense addition modal ~~~~~~~~~-->

                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return {

            applications: [],
            token: '',
            applicant: [],
            profile: [],
            index: -1,
            data: [],
            showProfileModal: false,

        }
    },
    async created() {

        this.token = window.Laravel.csrfToken;

        const res = await this.callApi('get', '/admin/applications/all_applications');
        
        if(res.status == 200){
            this.applications = res.data;
        }else{
            this.d();
        }

    },
    methods: {
        async showReportModal(application, index){
				
				this.applicant = application;
				this.index = index;
				
				// const [resTypes, resSub] = await Promise.all([

                //     this.callApi('get', '/admin/expenses/expenses_types'),
                //     this.callApi('get', '/admin/expenses/expense_sub_types')

                // ]);

                this.data = application;

                const res = await this.callApi('post', '/admin/applications/get_profile', this.data);

                if(res.status == 200){
                    this.profile = res.data;
                    this.showProfileModal = true;
                }else{
                    this.d();
                }
			},
    },

}
</script>