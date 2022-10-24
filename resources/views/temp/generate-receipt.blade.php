@foreach ($student_details as $student)
@foreach ($school_details as $school)
<table cellpadding="0" >
    <tbody>
        <tr class="">
            <td class="">
                <img class="object-cover w-28 h-28 rounded-full object-center inline-block align-middle mb-2" width="130"src="{{ public_path("images/".$school->image_path) }}" alt="" loading="lazy" />
            </td>
            <td style="text-align: center">
                <p>{{ $school->school_name }}
                    {{ $school->address }}
                    {{ $school->barangay }} {{ $school->city }} {{ $school->province }}, {{ $school->country }} {{ $school->zipcode }}
                    {{ $school->phone_no }} / {{ $school->mobile_no }}</p>
                
            </td>
            <td class=" text-center">
                <table class="" style="border-collapse: collapse;">
                    <tbody class="block md:table-row-group">
                        
                            <tr class="border-2  border-black-900  block table-row">
                                <td style="border: solid 1px #000" class=" border-2  border-black-900p-2 text-left block table-cell text-center">
                                    <span>Student ID</span><br>
                                    <span class="text-center text-sm block mt-4">{{ ($student->user_id) ? $student->user_id:"####" }}</span>
                                </td>
                                <td class="p-2 border-2 border-grey-900 text-left block table-cell text-center" style="border: solid 1px black">
                                    <span>Student Name</span><br>
                                    <span class="text-center text-sm block mt-4"> {{ ($student->name) ? $student->name: 'GUEST' }}</span>
                                </td>
                            </tr>
                            <tr class="border-2  border-black-900  block table-row" style="background: #fff;">
                                <td class="p-2 border-2  border-black-900 text-left block table-cell text-center" style="border: solid 1px black">
                                    <span>Reference #</span><br>
                                    <span class="text-center text-sm block mt-4">{{ $student->transaction_id }}</span>
                                </td>
                                <td class="p-2 border-2  border-black-900 text-left block table-cell text-center" style="border: solid 1px black">
                                    <span>Date</span><br>
                                    <span class="text-center text-sm block mt-4"> {{ date('F j, Y, g:i a', strtotime($student->created_at)) }} </span>
                                </td>
                            </tr>
                            
                        
                    </tbody>
                </table>
                
                
            </td>
        </tr>
    </tbody>
</table>
<table style="margin-bottom: 20px;border-collapse: collapse;">
    <tr >
        <td >&nbsp;</td>
    </tr>
    <tr style="background: #fff;">
        <td></td>
        <td colspan="2" >
            <p>{{ $student->name }} <br>
                {{ $student->address }}
                {{ $student->city }} {{ $student->province }}, {{ $student->country }} {{ $student->zipcode }} <br>
                {{ $student->number }}</p>
        </td>
    </tr>
    <tr >
        {{-- <td rowspan="2"></td> --}}
    </tr>
</table>
<table style="border: 1px solid #000; width:100%;border-collapse: collapse;" cellpadding="0">
    <thead>
        <tr>
            <th style="border: 1px solid #000;">Ref #</th>
            <th style="border: 1px solid #000;">Description of Transaction</th>
            <th style="border: 1px solid #000;">Amount</th>
            <th style="border: 1px solid #000;">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            {{-- Ref# --}}
            <td style="border: 1px solid #000;text-align:center">
                <span style="display: block;margin-top:5px">{{ $student->transaction_id }}</span>
                <span style="display:block;margin-bottom:100px"></span>
                <span style="display: block;visibility:hidden;font-weight:bold">Sub-Total</span>
                <span style="display: block;visibility:hidden;font-weight:bold">Discount</span>
                <span style="display: block;visibility:hidden;font-weight:bold">Total</span>
                <span style="display: block;visibility:hidden;font-weight:bold">Cash Entered</span>
                <span style="display: block;visibility:hidden;font-weight:bold">Change</span>

            </td>
            {{-- Description --}}
            <td style="border: 1px solid #000;text-align:left">
                <span style="display: block;margin-top:5px">{{ $student->notes }}</span>
                <span style="display:block;margin-bottom:100px"></span>
                <span style="display: block;visibility:visible;font-weight:bold">Sub-Total</span>
                <span style="display: block;visibility:visible;font-weight:bold">Discount</span>
                <span style="display: block;visibility:visible;font-weight:bold">Total</span>
                <span style="display: block;visibility:visible;font-weight:bold">Cash Entered</span>
                <span style="display: block;visibility:visible;font-weight:bold">Change</span>
            </td>
            {{-- Amount --}}
            <td style="border: 1px solid #000;text-align:right">
                <span style="display: block;margin-top:5px">
                    {{ number_format($student->amount, 2, '.', ',') }}</span>
                <span style="display:block;margin-bottom:100px"></span>
                <span style="display: block;visibility:hidden;font-weight:bold">Sub-Total</span>
                <span style="display: block;visibility:hidden;font-weight:bold">Discount</span>
                <span style="display: block;visibility:hidden;font-weight:bold">Total</span>
                <span style="display: block;visibility:hidden;font-weight:bold">Cash Entered</span>
                <span style="display: block;visibility:hidden;font-weight:bold">Change</span>
            </td>
            {{-- Subtotal --}}
            <td style="border: 1px solid #000;text-align:right">
                <span style="display: block;margin-top:5px">
                    {{ number_format($student->sub_total, 2, '.', ',') }}</span>
                <span style="display:block;margin-bottom:100px"></span>
                <span style="display: block;visibility:visible;font-weight:bold">{{ number_format($student->sub_total, 2, '.', ',') }}</span>
                <span style="display: block;visibility:visible;font-weight:bold">{{ number_format($student->discount, 2, '.', ',') }}</span>
                <span style="display: block;visibility:visible;font-weight:bold">{{ number_format($student->total, 2, '.', ',') }}</span>
                <span style="display: block;visibility:visible;font-weight:bold">{{ number_format($student->cash, 2, '.', ',') }}</span>
                <span style="display: block;visibility:visible;font-weight:bold">{{ number_format($student->change, 2, '.', ',') }}</span>
            </td>
        </tr>
        
        
    </tbody>
</table>
@endforeach
@endforeach