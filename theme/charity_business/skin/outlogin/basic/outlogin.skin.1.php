<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>





            <!-- Sign in Modal -->
            <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="mySigninModalLabel">회원 <strong>로그인</strong></h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
                  <div class="control-group">
				  <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
                    <label for="ol_id" id="ol_idlabel" class="control-label" for="inputText">회원아이디</label>
                    <div class="controls">
                      <input type="text" id="ol_id" name="mb_id" placeholder="회원아이디">
                    </div>
                  </div>
                  <div class="control-group">
                    <label for="ol_pw" id="ol_pwlabel" class="control-label" for="inputSigninPassword">비밀번호</label>
                    <div class="controls">
                     <input type="password" name="mb_password" id="ol_pw" placeholder="비밀번호">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn">Sign in</button>
                    </div>
                    <p class="aligncenter margintop20">
					<a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost">정보찾기</a>

                    </p>
                  </div>
                </form>
              </div>
            </div>
            <!-- end signin modal -->


<script>
jQuery(function($) {

    var $omi = $('#ol_id'),
        $omp = $('#ol_pw'),
        $omi_label = $('#ol_idlabel'),
        $omp_label = $('#ol_pwlabel');

    $omi_label.addClass('ol_idlabel');
    $omp_label.addClass('ol_pwlabel');

    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f)
{
    if( $( document.body ).triggerHandler( 'outlogin1', [f, 'foutlogin'] ) !== false ){
        return true;
    }
    return false;
}
</script>
<!-- } 로그인 전 아웃로그인 끝 -->
