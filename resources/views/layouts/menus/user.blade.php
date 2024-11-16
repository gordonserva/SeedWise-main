@php
$deposit_requests = request_count('deposit_requests', true);
$withdraw_requests = request_count('withdraw_requests', true);
$member_requests = request_count('member_requests', true);
$pending_loans = request_count('pending_loans', true);
$permissions = permission_list();
@endphp

<li>
	<a href="{{ route('dashboard.index') }}"><i class="ti-dashboard"></i> <span>{{ _lang('Corporate Dashboard') }}</span></a>
</li>
<li>
	<a href="javascript: void(0);"><i class="fas fa-user-friends"></i><span>{{ _lang('Pending Loans') }} {!! xss_clean($member_requests) !!}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
	<ul class="nav-second-level" aria-expanded="false">
		@if (in_array('members.index',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('members.index') }}">{{ _lang('View Employees') }}</a></li>
		@endif

		@if (in_array('members.create',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('members.create') }}">{{ _lang('Add Employee') }}</a></li>
		@endif

		@if (in_array('members.import',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('members.import') }}">{{ _lang('Bulk Import') }}</a></li>
		@endif

		@if (in_array('custom_fields.index',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('custom_fields.index', 'members') }}">{{ _lang('Custom Fields') }}</a></li>
		@endif

		@if (in_array('members.pending_requests',$permissions))
		<li class="nav-item">
			<a class="nav-link" href="{{ route('members.pending_requests') }}">{{ _lang('Team Loan Requests') }} {!! xss_clean($member_requests) !!}</a>
		</li>
		@endif
		
	</ul>
</li>


<li>
	<a href="javascript: void(0);"><i class="fas fa-hand-holding-usd"></i><span>{{ _lang('Loans') }} {!! xss_clean($pending_loans) !!}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
	<ul class="nav-second-level" aria-expanded="false">
		@if (in_array('loans.index',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('loans.index') }}">{{ _lang('All Team Loans') }}</a></li>
		@endif

		@if (in_array('loans.filter',$permissions))
		<li class="nav-item">
			<a class="nav-link" href="{{ route('loans.filter', 'pending') }}">
				{{ _lang('Pending Loans') }}
				{!! xss_clean($pending_loans) !!}
			</a>
		</li>
		@endif

		@if (in_array('loans.filter',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('loans.filter', 'active') }}">{{ _lang('Active Loans') }}</a></li>
		@endif

		@if (in_array('loans.admin_calculator',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('loans.admin_calculator') }}">{{ _lang('Loan Calculator') }}</a></li>
		@endif

		@if (in_array('custom_fields.index',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('custom_fields.index', 'loans') }}">{{ _lang('Custom Fields') }}</a></li>
		@endif
	</ul>
</li>

@if (in_array('loan_payments.index',$permissions))
<li><a href="{{ route('loan_payments.index') }}"><i class="fas fa-receipt"></i><span>{{ _lang('Repayments') }}</span></a></li>
@endif

<li>
	<a href="javascript: void(0);"><i class="fas fa-landmark"></i><span>{{ _lang('Accounts') }}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
	<ul class="nav-second-level" aria-expanded="false">
		@if (in_array('savings_accounts.index',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('savings_accounts.index') }}">{{ _lang('All Accounts') }}</a></li>
		@endif

		@if (in_array('interest_calculation.calculator',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('interest_calculation.calculator') }}">{{ _lang('Interest Calculation') }}</a></li>
		@endif
	</ul>
</li>

<li>
	<a href="javascript: void(0);"><i class="fas fa-coins"></i><span>{{ _lang('Invest') }} {!! xss_clean($deposit_requests) !!}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
	<ul class="nav-second-level" aria-expanded="false">
		@if (in_array('transactions.create',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('transactions.create') }}?type=deposit">{{ _lang('Make a deposit') }}</a></li>
		@endif

		@if (in_array('deposit_requests.index',$permissions))
		<li class="nav-item">
			<a class="nav-link" href="{{ route('deposit_requests.index') }}">
				{{ _lang('Deposit Requests') }}
				{!! xss_clean($deposit_requests) !!}
			</a>
		</li>
		@endif
	</ul>
</li>

<li>
	<a href="javascript: void(0);"><i class="fas fa-money-check"></i><span>{{ _lang('Withdraws') }} {!! xss_clean($withdraw_requests) !!}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
	<ul class="nav-second-level" aria-expanded="false">
		@if (in_array('transactions.create',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('transactions.create') }}?type=withdraw">{{ _lang('Withdraw Money') }}</a></li>
		@endif
		@if (in_array('withdraw_requests.index',$permissions))
		<li class="nav-item">
			<a class="nav-link" href="{{ route('withdraw_requests.index') }}">
				{{ _lang('Withdraw Requests') }}
				{!! xss_clean($withdraw_requests) !!}
			</a>
		</li>
		@endif
	</ul>
</li>



<li>
	<a href="javascript: void(0);"><i class="ti-bar-chart"></i><span>{{ _lang('Reports') }}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
	<ul class="nav-second-level" aria-expanded="false">
		@if (in_array('reports.account_statement',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('reports.account_statement') }}">{{ _lang('Account Statement') }}</a></li>
		@endif

		@if (in_array('reports.loan_report',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('reports.loan_report') }}">{{ _lang('Loan Report') }}</a></li>
		@endif

		@if (in_array('reports.loan_due_report',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('reports.loan_due_report') }}">{{ _lang('Loan Due Report') }}</a></li>
		@endif

		@if (in_array('reports.revenue_report',$permissions))
		<li class="nav-item"><a class="nav-link" href="{{ route('reports.revenue_report') }}">{{ _lang('Commission Revenue Report') }}</a></li>
		@endif
	</ul>
</li>
<li>
	<a href="javascript: void(0);"><i class="ti-bar-chart"></i><span>{{ _lang('Reports') }}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
	<ul class="nav-second-level" aria-expanded="false">
		<li class="nav-item"><a class="nav-link" href="{{ route('customer_reports.account_statement') }}">{{ _lang('Investment Account Statement') }}</a></li>
		<li class="nav-item"><a class="nav-link" href="{{ route('customer_reports.transactions_report') }}">{{ _lang('Transaction Report') }}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('customer_reports.account_balances') }}">{{ _lang('Account Balance') }}</a></li>
		<li class="nav-item"><a class="nav-link" href="#">{{ _lang('Credit Statement') }}</a></li>
    </ul>
</li>

<li>
	<a href="javascript: void(0);"><i class="ti-bar-chart"></i><span>{{ _lang('Terms & Conditions') }}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
	<ul class="nav-second-level" aria-expanded="false">
		<li class="nav-item"><a class="nav-link" href="#">{{ _lang('Investors') }}</a></li>
		<li class="nav-item"><a class="nav-link" href="#">{{ _lang('HRs & Corporate') }}</a></li>
        <li class="nav-item"><a class="nav-link" href="#">{{ _lang('Business Owners') }}</a></li>
		<li class="nav-item"><a class="nav-link" href="#">{{ _lang('Institutional Borrowers') }}</a></li>
    </ul>
</li>
<li>
	<a href="https://seedwise.ug/faqs/"><i class="fas fa-life-ring"></i><span>{{ _lang('F.A.Qs') }}</span></a>
</li>