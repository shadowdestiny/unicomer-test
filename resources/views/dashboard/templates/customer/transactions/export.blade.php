@extends('dashboard.layouts.export')

@section('title') Transaction @endsection

@section('content')

   <div style="width: 100%">
         <table class="" style="margin-left: auto;margin-right: auto;text-align: center" width="95%">
            <tbody>
            <tr>
               <td class="">
                  <table>
                     <tbody>
                     <tr>
                        <td>
                           {{ Html::image('dashboard/assets/img/Logotipos_pdf.png','',['width'=>'400']) }}
                        </td>
                     </tr>
                     <tr>
                        <td class="price_tab_desc_first white_text raleway weight_700">
                           <table>
                              <tbody>
                              <tr>
                                 <td class="price_tab_desc_first white_text raleway weight_700">
                                    <div style="background: #124aa1;color:#ffffff;padding: 5px 10px 5px 10px;">
                                       Customer/Cliente
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div style="padding: 5px 10px 5px 10px;">
                                       {{strtoupper($transaction->credit->customer->name.", ".$transaction->credit->customer->last_name)}}
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div style="padding: 5px 10px 5px 10px;">
                                       {{$transaction->credit->customer->home_address}}
                                    </div>
                                 </td>
                              </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     </tbody>
                  </table>

               </td>
               <td align="right">
                  <table width="100%">
                     <tbody>
                     <tr>
                        <td align="right">
                           <div style="height: 100px">&nbsp;</div>
                           <div style="padding: 5px 10px 5px 10px; color:#124aa1" class="price_tab_desc_first white_text raleway weight_700">
                              <h1>Statement</h1>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div style="height: 10px">&nbsp;</div>
                           <table width="100%">
                              <tbody>
                              <tr>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    Date
                                 </td>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    {{ $now }}
                                 </td>
                              </tr>
                              <tr>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    Account#
                                 </td>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    {{ $transaction->credit->customer->acct_num }}
                                 </td>
                              </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr>
                        <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                           <div style="background: #124aa1;color:#ffffff;padding: 5px 10px 5px 10px;">
                              Account Summary/Resumen de cuenta
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <table width="100%">
                              <tbody>
                              <tr>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    Current Balance
                                 </td>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    $&nbsp;{{ $transaction->present_bal }}
                                 </td>
                              </tr>
                              <tr>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    Installment
                                 </td>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    $&nbsp;{{ $transaction->installment }}
                                 </td>
                              </tr>
                              <tr>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    Last Payment
                                 </td>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    $&nbsp;{{ AmountFormat::normalFormat($transaction->total_last_payment) }}
                                 </td>
                              </tr>
                              <tr>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    Minimun Payment
                                 </td>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    $&nbsp;{{ AmountFormat::normalFormat($transaction->minimun_payment) }}
                                 </td>
                              </tr>
                              <tr>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    Due Date
                                 </td>
                                 <td align="right" class="price_tab_desc_first white_text raleway weight_700">
                                    {{ $purchase_date }}
                                 </td>
                              </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td colspan="2">
                  <div style="height: 20px">&nbsp;</div>
                  <table width="100%">
                     <tbody>
                     <tr>
                        <td colspan="4">
                           <div style="padding: 5px 10px 5px 10px;">
                              To Pay Off balance Amount Contact us / Para Información del monto para cancelar su Balance total contáctenos: 713-592.6181 Opc. 4
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td align="center" style="border: 1px solid #124aa1;background: #124aa1; color:#ffffff" class="price_tab_desc_first white_text raleway weight_700">
                           <div style="padding: 2px 5px 2px 5px;">
                              Date/Fecha
                           </div>
                        </td>
                        <td align="center" style="border: 1px solid #124aa1;padding: 5px 10px 5px 10px; background: #124aa1; color:#ffffff" class="price_tab_desc_first white_text raleway weight_700">
                           <div style="padding: 2px 5px 2px 5px;">
                              Transaction/Transacciones
                           </div>
                        </td>
                        <td align="center" style="border: 1px solid #124aa1;padding: 5px 10px 5px 10px; background: #124aa1; color:#ffffff" class="price_tab_desc_first white_text raleway weight_700">
                           <div style="padding: 2px 5px 2px 5px;">
                              Payments/Pagos
                           </div>
                        </td>
                        <td align="center" style="border: 1px solid #124aa1;padding: 5px 10px 5px 10px; background: #124aa1; color:#ffffff" class="price_tab_desc_first white_text raleway weight_700">
                           <div style="padding: 2px 5px 2px 5px;">
                              Ammount Due/Monto a pagar
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           <div style="padding: 5px 10px 5px 10px;">
                              {{ $date_of_last_payment }}
                           </div>
                        </td>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           <div style="padding: 5px 10px 5px 10px;">
                              Last Payment received/Último Pago recibido
                           </div>
                        </td>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           <div style="padding: 5px 10px 5px 10px;">
                              $ {{ AmountFormat::normalFormat($transaction->total_last_payment) }}
                           </div>
                        </td>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           &nbsp;
                        </td>
                     </tr>
                     <tr>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           &nbsp;
                        </td>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           <div style="padding: 5px 10px 5px 10px;">
                              Installment Due / Cuota Pendiente
                           </div>
                        </td>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           &nbsp;
                        </td>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           <div style="padding: 5px 10px 5px 10px;">
                              $ {{ AmountFormat::normalFormat($transaction->installment) }}
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           &nbsp;
                        </td>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           <div style="padding: 5px 10px 5px 10px;">
                              Late Charge / Cargo Moratorio
                           </div>
                        </td>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           &nbsp;
                        </td>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           <div style="padding: 5px 10px 5px 10px;">
                              $ {{ AmountFormat::normalFormat($transaction->late_fee) }}
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="3" class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           <div style="padding: 5px 10px 5px 10px;">
                              Minimun Payment / Pago Minimo
                           </div>
                        </td>
                        <td class="price_tab_desc_first white_text raleway weight_700" style="border: 1px solid #124aa1;">
                           <div style="padding: 5px 10px 5px 10px;">
                              $ {{ AmountFormat::normalFormat($transaction->minimun_payment) }}
                           </div>
                        </td>
                     </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            </tbody>
         </table>
   </div>


@endsection