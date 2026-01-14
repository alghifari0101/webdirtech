@if($step === 2)
<div class="w-full lg:flex-1 min-w-0 lg:sticky lg:top-8 order-1 lg:order-2">
     <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl border border-slate-200/60 overflow-hidden relative cv-wrapper">
        <div class="bg-slate-50 border-b border-slate-100 p-3 sm:p-4 flex justify-between items-center no-print">
            <div class="flex items-center gap-2 text-slate-400 font-bold text-[10px] uppercase tracking-widest">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Live Render
            </div>
            @if(!auth()->user()->is_premium && $data['template'] !== 'cv_ats_001')
                <div class="text-[10px] font-bold text-rose-500 flex items-center gap-1 uppercase tracking-wider bg-rose-50 px-2 sm:px-3 py-1 rounded-full border border-rose-100 italic">
                    <i class="fa-solid fa-crown text-[8px]"></i> Premium
                </div>
            @endif
        </div>
        <div class="cv-scale-wrapper">
            <div class="px-[var(--cv-pad-x)] mx-auto min-h-[297mm] w-[210mm] text-slate-900 leading-relaxed bg-white shadow-2xl transition-all duration-300" 
                 style="font-family: Arial, Helvetica, sans-serif; --cv-pad-x: 15mm; --cv-pad-y: 15mm; padding-top: var(--cv-pad-y); padding-bottom: var(--cv-pad-y);" 
                 id="cv-preview">
                  <table class="w-full border-separate" style="border-spacing: 0;">
                     <thead>
                         <tr>
                             <td class="print-page-spacer">
                                 <div style="height: 15mm;">&nbsp;</div>
                             </td>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td class="p-0">
                                 @include('livewire.member.cv-templates.' . $data['template'], [
                                     'data' => $data,
                                     'labels' => $cur,
                                     'photo' => $photo
                                 ])
                             </td>
                         </tr>
                     </tbody>
                     <tfoot>
                         <tr>
                             <td class="print-page-spacer">
                                 <div style="height: 15mm;">&nbsp;</div>
                             </td>
                         </tr>
                     </tfoot>
                  </table>
            </div>
        </div>
     </div>
</div>
@endif
