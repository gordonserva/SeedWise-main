@extends('layouts.app')

@section('content')

@php $permissions = permission_list(); @endphp
<div class="row">
	@if (in_array('dashboard.total_customer_widget', $permissions))
	<div class="col-xl-3 col-md-6">
		<div class="card mb-4 primary-card dashboard-card">
			<div class="card-body">
				<div class="d-flex">
					<div class="flex-grow-1">
						<h5>{{ _lang('Total Members') }}</h5>
						<h4 class="pt-1 mb-0"><b>{{ $total_customer }}</b></h4>
					</div>
					<div>
						<a href="{{ route('members.index') }}"><i class="ti-arrow-right"></i>&nbsp;{{ _lang('View') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif

	
	<div class="col-xl-3 col-md-6">
		<div class="card mb-4 success-card dashboard-card">
			<div class="card-body">
				<div class="d-flex">
					<div class="flex-grow-1">
						<h5>{{ _lang('Investment Requests') }}</h5>
						<h4 class="pt-1 mb-0"><b>{{ request_count('deposit_requests') }}</b></h4>
					</div>
					<div>
						<a href="{{ route('deposit_requests.index') }}"><i class="ti-arrow-right"></i>&nbsp;{{ _lang('View') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	
	<div class="col-xl-3 col-md-6">
		<div class="card mb-4 warning-card dashboard-card">
			<div class="card-body">
				<div class="d-flex">
					<div class="flex-grow-1">
						<h5>{{ _lang('Withdraw Requests') }}</h5>
						<h4 class="pt-1 mb-0"><b>{{ request_count('withdraw_requests') }}</b></h4>
					</div>
					<div>
						<a href="{{ route('withdraw_requests.index') }}"><i class="ti-arrow-right"></i>&nbsp;{{ _lang('View') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	
	<div class="col-xl-3 col-md-6">
		<div class="card mb-4 danger-card dashboard-card">
			<div class="card-body">
				<div class="d-flex">
					<div class="flex-grow-1">
						<h5>{{ _lang('My Loans') }}</h5>
						<h4 class="pt-1 mb-0"><b>{{ request_count('pending_loans') }}</b></h4>
					</div>
					<div>
						<a href="{{ route('loans.index') }}"><i class="ti-arrow-right"></i>&nbsp;{{ _lang('View') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6">
		<div class="card mb-4 success-card dashboard-card">
			<div class="card-body">
				<div class="d-flex">
					<div class="flex-grow-1">
						<h5>{{ _lang('Investment Need') }}</h5>
						<h4 class="pt-1 mb-0"><b>{{ request_count('pending_loans') }}</b></h4>
					</div>
					<div>
						<a href="{{ route('withdraw.manual_methods') }}"><i class="ti-arrow-right"></i>&nbsp;{{ _lang('Deposit') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
    
	<div class="col-md-4 col-sm-5 mb-4">
		<div class="card h-100">
			<div class="card-header d-flex align-items-center">
				<span>{{ _lang('Investments Overview').' - '.date('M Y') }}</span>
			</div>
			<div class="card-body">
				<canvas id="expenseOverview"></canvas>
			</div>
		</div>
	</div>


	<div class="col-md-8 col-sm-7 mb-4">
		<div class="card h-100">
			<div class="card-header d-flex align-items-center">
				<span>{{ _lang('Deposit & Withdraw Analytics').' - '.date('Y')  }}</span>
				<select class="filter-select ml-auto py-0 auto-select" data-selected="{{ base_currency_id() }}">
					@foreach(\App\Models\Currency::where('status',2)->get() as $currency)
					<option value="{{ $currency->id }}" data-symbol="{{ currency($currency->name) }}">{{ $currency->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="card-body">
				<canvas id="transactionAnalysis"></canvas>
			</div>
		</div>
	</div>

</div>


<div class="row">
	<div class="col-xl-12">
		<div class="card mb-4">
			<div class="card-header">
				{{ _lang(' Investment Account Overview') }}
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th class="text-nowrap">{{ _lang('Account Number') }}</th>
								<th class="text-nowrap">{{ _lang('Account Type') }}</th>
								<th>{{ _lang('Currency') }}</th>
								<th class="text-right">{{ _lang('Balance') }}</th>
								<th class="text-nowrap text-right">{{ _lang('Loan Guarantee') }}</th>
								<th class="text-nowrap text-right">{{ _lang('Current Balance') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach(get_account_details(auth()->user()->member->id) as $account)
							<tr>
								<td>{{ $account->account_number }}</td>
								<td class="text-nowrap">{{ $account->savings_type->name }}</td>
								<td>{{ $account->savings_type->currency->name }}</td>
								<td class="text-nowrap text-right">{{ decimalPlace($account->balance, currency($account->savings_type->currency->name)) }}</td>						
								<td class="text-nowrap text-right">{{ decimalPlace($account->blocked_amount, currency($account->savings_type->currency->name)) }}</td>						
								<td class="text-nowrap text-right">{{ decimalPlace($account->balance - $account->blocked_amount, currency($account->savings_type->currency->name)) }}</td>						
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xl-12">
		<div class="card mb-4">
			<div class="card-header">
				{{ _lang('Upcoming Investment Payouts') }}
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<th class="text-nowrap">{{ _lang('Investor ID') }}</th>
							<th class="text-nowrap">{{ _lang('Next Payment Date') }}</th>
							<th>{{ _lang('Status') }}</th>
							<th class="text-nowrap text-right">{{ _lang('PayOut Amount') }}</th>
							<th class="text-center">{{ _lang('Action') }}</th>
						</thead>
						<tbody>
							@if(count($deposits) == 0)
								<tr>
									<td colspan="5"><h6 class="text-center">{{ _lang('No Active Investment Available') }}</h6></td>
								</tr>
							@endif

							@foreach($loans as $loan)
							<tr>
								<td>{{ $loan->loan_id }}</td>
								<td class="text-nowrap">{{ $loan->next_payment->repayment_date }}</td>
								<td>{!! $loan->next_payment->getRawOriginal('repayment_date') >= date('Y-m-d') ? xss_clean(show_status(_lang('Upcoming'),'success')) : xss_clean(show_status(_lang('Due'),'danger')) !!}</td>
								<td class="text-nowrap text-right">{{ decimalPlace($loan->next_payment->amount_to_pay, currency($loan->currency->name)) }}</td>
								<td class="text-center"><a href="{{ route('loans.loan_payment',$loan->id) }}" class="btn btn-primary btn-xs text-nowrap">{{ _lang('Collect Now') }}</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xl-12">
		<div class="card mb-4">
			<div class="card-header">
				{{ _lang('Upcoming Loan Payment') }}
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<th class="text-nowrap">{{ _lang('Loan ID') }}</th>
							<th class="text-nowrap">{{ _lang('Next Payment Date') }}</th>
							<th>{{ _lang('Status') }}</th>
							<th class="text-nowrap text-right">{{ _lang('Amount to Pay') }}</th>
							<th class="text-center">{{ _lang('Action') }}</th>
						</thead>
						<tbody>
							@if(count($loans) == 0)
								<tr>
									<td colspan="5"><h6 class="text-center">{{ _lang('No Active Loan Available') }}</h6></td>
								</tr>
							@endif

							@foreach($loans as $loan)
							<tr>
								<td>{{ $loan->loan_id }}</td>
								<td class="text-nowrap">{{ $loan->next_payment->repayment_date }}</td>
								<td>{!! $loan->next_payment->getRawOriginal('repayment_date') >= date('Y-m-d') ? xss_clean(show_status(_lang('Upcoming'),'success')) : xss_clean(show_status(_lang('Due'),'danger')) !!}</td>
								<td class="text-nowrap text-right">{{ decimalPlace($loan->next_payment->amount_to_pay, currency($loan->currency->name)) }}</td>
								<td class="text-center"><a href="{{ route('loans.loan_payment',$loan->id) }}" class="btn btn-primary btn-xs text-nowrap">{{ _lang('Pay Now') }}</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xl-12">
		<div class="card mb-4">
			<div class="card-header">
				{{ _lang('Recent Transactions') }}
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered data-table" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>{{ _lang('Date') }}</th>
								<th>{{ _lang('AC Number') }}</th>
								<th class="text-right">{{ _lang('Amount') }}</th>
								<th>{{ _lang('DR/CR') }}</th>
								<th>{{ _lang('Type') }}</th>
								<th>{{ _lang('Status') }}</th>
								<th class="text-center">{{ _lang('Details') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach($recent_transactions as $transaction)
							@php
							$symbol = $transaction->dr_cr == 'dr' ? '-' : '+';
							$class  = $transaction->dr_cr == 'dr' ? 'text-danger' : 'text-success';
							@endphp
							<tr>
								<td>{{ $transaction->trans_date }}</td>
								<td>{{ $transaction->account->account_number }} - {{ $transaction->account->savings_type->name }} ({{ $transaction->account->savings_type->currency->name }})</td>
								<td class="text-right"><span class="{{ $class }}">{{ $symbol.' '.decimalPlace($transaction->amount, currency($transaction->account->savings_type->currency->name)) }}</span></td>
								<td>{{ strtoupper($transaction->dr_cr) }}</td>
								<td>{{ str_replace('_',' ',$transaction->type) }}</td>
								<td>{!! xss_clean(transaction_status($transaction->status)) !!}</td>
								<td class="text-center"><a href="{{ route('trasnactions.details', $transaction->id) }}" target="_blank" class="btn btn-outline-primary btn-xs">{{ _lang('View') }}</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
