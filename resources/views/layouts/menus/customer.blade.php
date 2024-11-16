<li>
	<a href="{{ route('dashboard.index') }}"><i class="ti-dashboard"></i> <span>{{ _lang('Investor Dashboard') }}</span></a>
</li>

<li>

	<a href="javascript: void(0);"><i class="fas fa-coins"></i><span>{{ _lang('Deposit /Invest') }}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
	<ul class="nav-second-level" aria-expanded="false">
        <li class="nav-item"><a class="nav-link" href="{{ route('deposit.automatic_methods') }}">{{ _lang('Online Deposit') }}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('deposit.manual_methods') }}">{{ _lang('Manual Deposit') }}</a></li>
	</ul>
	<ul class="nav-second-level" aria-expanded="false">
	<li><a href="{{ route('withdraw.manual_methods') }}"><i class="fas fa-money-check"></i><span>{{ _lang('Request Withdrawal') }}</span></a></li>
	</ul>

</li>

<li>
	<a href="javascript: void(0);"><i class="fas fa-hand-holding-usd"></i><span>{{ _lang('Borrow') }}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
	<ul class="nav-second-level" aria-expanded="false">
        <li class="nav-item"><a class="nav-link" href="{{ route('loans.my_loans') }}">{{ _lang('My Loans') }}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('loans.apply_loan') }}">{{ _lang('New Loan') }}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('loans.calculator') }}">{{ _lang('Loan Calculator') }}</a></li>
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