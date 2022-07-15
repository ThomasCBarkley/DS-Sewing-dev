<table align="center">
<tr>
<td><asp:ValidationSummary Runat="server" HeaderText="<b>Please correct the following errors:</b>" id="ValidationSummary1" /></td>
</tr>
<tr>
<td>
    <span>{{ $stepData['name'] }}</span>&nbsp;|&nbsp;<span>{{ $stepData['phone'] }}</span>&nbsp;|&nbsp;<span>{{ $stepData['email'] }}</span>
</td>
</tr>
<tr>
<td>
    <table border="0" bgcolor="#ffcc66" style="BORDER-RIGHT:black 1px solid; BORDER-TOP:black 1px solid; BORDER-LEFT:black 1px solid; BORDER-BOTTOM:black 1px solid" width="100%">
        <tr>
            <td>
                The distance between you A-B reference measurement is <asp:Label Runat="server" ID="lblABDist"/>. Round to quarter inches.
            </td>
        </tr>
        <tr>
            <td>Your plot ID: <b><font color="red">{{ $stepData['plotId'] }}</font></b> - remember this number to continue where you left off.</td>
                </tr>
                <tr>
                    <td colspan="2" bgcolor="#cccccc" align="middle"><b>Please Enter A-B measurements.</b></td>
                </tr>
                <tr>
                    <td colspan="2" valign="top">
                        @if ($stepData['plotABDistance'])
                            <table id="tblPoints">
                                <tr>
                                    <td align="center" valign="top"><b>X</b></td>
                                    <td align="center" colspan="2" valign="top"><b>A</b></td>
                                    <td align="center" colspan="2" valign="top"><b>B</b></td>
                                </tr>
                                @foreach($stepData['plotABDistance'] as $item)
                                    <tr id="{{ $loop->index }}">
                                        <td valign="top">
                                            {{ $item->plotindex }}
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="PAF{{ $loop->index }}" value="@format($item->adist/12)"/> feet
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="PAI{{ $loop->index }}" value="{{ $item->adist }}" /> inches
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="PBF{{ $loop->index }}" value="@format($item->bdist/12)" /> feet
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="PBI{{ $loop->index }}" value="{{ $item->bdist }}" /> inches
                                        </td>
                                    </tr>
                                @endforeach
                                <tr id="{{ count($stepData['plotABDistance']) }}">
                                    <td valign="top"></td>
                                    <td valign="top">
                                        <input type="text" name="PAF{{ count($stepData['plotABDistance']) }}" value=""/> feet
                                    </td>
                                    <td valign="top">
                                        <input type="text" name="PAI{{ count($stepData['plotABDistance']) }}" value="" /> inches
                                    </td>
                                    <td valign="top">
                                        <input type="text" name="PBF{{ count($stepData['plotABDistance']) }}" value="" /> feet
                                    </td>
                                    <td valign="top">
                                        <input type="text" name="PBI{{ count($stepData['plotABDistance']) }}" value="" /> inches
                                    </td>
                                </tr>
                            </table>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2" bgcolor="#cccccc" align="middle"><b>Please enter diagonal and crosscheck reference points.</b></td>
                </tr>
                <tr>
                    <td colspan="2" valign="top">
                        @if ($stepData['crossPoints'])
                            <table id="tblCross">
                                <tr>
                                    <td align="center" valign="top"><b>X Start Point</b></td>
                                    <td align="center" valign="top"><b>X End Point</b></td>
                                    <td colspan="2" align="center" valign="top"><b>Distance</b></td>
                                </tr>
                                @foreach($stepData['crossPoints'] as $item)
                                    <tr>
                                        <td valign="top">
                                            <input type="text" name="CPF{{ $loop->index }}" value="{{ $item->fromindex }}" />
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="CPT{{ $loop->index }}" value="{{ $item->toindex }}" />
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="CPSF{{ $loop->index }}" value="@format($item->crossdistance)" /> feet
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="CPSI{{ $loop->index }}" value="{{ round(fmod($item->crossdistance, 12)) }}" /> inches
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td valign="top">
                                        <input type="text" name="CPF{{ count($stepData['crossPoints']) }}" value="" />
                                    </td>
                                    <td valign="top">
                                        <input type="text" name="CPT{{ count($stepData['crossPoints']) }}" value="" />
                                    </td>
                                    <td valign="top">
                                        <input type="text" name="CPSF{{ count($stepData['crossPoints']) }}" value="" /> feet
                                    </td>
                                    <td valign="top">
                                        <input type="text" name="CPSI{{ count($stepData['crossPoints']) }}" value="" /> inches
                                    </td>
                                </tr>
                            </table>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2" bgcolor="#cccccc" align="middle"><b>Please enter perimeter reference points.</b></td>
                </tr>
                <tr>
                    <td colspan="2" valign="top">
                        @if ($stepData['perimPoints'])
                            <table id="tblPerim">
                                <tr>
                                    <td align="center" valign="top"><b>X Start Point</b></td>
                                    <td align="center" valign="top"><b>X End Point</b></td>
                                    <td colspan="2" align="center" valign="top"><b>Distance</b></td>
                                </tr>
                                @foreach($stepData['perimPoints'] as $item)
                                    <tr>
                                        <td valign="top">
                                            <input type="text" name="PPF{{ $loop->index }}" value="{{ $item->fromindex }}" />
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="PPT{{ $loop->index }}" value="{{ $item->toindex }}"/>
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="PPSF{{ $loop->index }}" value="@format($item->crossdistance/ 12)" /> inches
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="PPSI{{ $loop->index }}" value="{{ round(fmod($item->crossdistance, 12)) }}" /> inches
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td valign="top">
                                        <input type="text" name="PPF{{ count($stepData['perimPoints']) }}" value="" />
                                    </td>
                                    <td valign="top">
                                        <input type="text" name="PPT{{ count($stepData['perimPoints']) }}" value=""/>
                                    </td>
                                    <td valign="top">
                                        <input type="text" name="PPSF{{ count($stepData['perimPoints']) }}" value="" /> inches
                                    </td>
                                    <td valign="top">
                                        <input type="text" name="PPSI{{ count($stepData['perimPoints']) }}" value="" /> inches
                                    </td>
                                </tr>

                            </table>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="top">
                        <input type="submit" Runat="server" ID="btnSave" value="Save Changes" />
                    </td>
                    <td align="right" valign="top">
                        <input type="submit" Runat="server" ID="btnNext" value="Show Me My Cover" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
